import { useState, useRef, useEffect } from "react";
import { createRoot } from "react-dom/client";

// ─── ID generator ─────────────────────────────────────────────────────────────
let _uid = 0;
const uid = () => ++_uid;

// ─── Constants ────────────────────────────────────────────────────────────────
const CATS = [
  { value: "foreign",  label: "海外の旅行記 (foreign)"  },
  { value: "domestic", label: "国内の旅行記 (domestic)" },
  { value: "others",   label: "その他のこと (others)"   },
];
const CAT_NAMES = { foreign: "海外の旅行記", domestic: "国内の旅行記", others: "その他のこと" };
const SUB = [
  { value: "travelogue", label: "旅行記 (travelogue)" },
  { value: "location",   label: "撮影地 (location)"   },
];

// ─── Escape helpers ───────────────────────────────────────────────────────────
const escDq = (s = "") => s.replace(/\\/g, "\\\\").replace(/"/g, '\\"').replace(/\n/g, "\\n");
const escSq = (s = "") => s.replace(/\\/g, "\\\\").replace(/'/g, "\\'");

// ─── Default factories ────────────────────────────────────────────────────────
const mkSection = () => ({ id: uid(), blocks: [] });
const mkH   = () => ({ id: uid(), type: "h",   level: "h3", text: "" });
const mkP   = () => ({ id: uid(), type: "p",   text: "" });
const mkImg = () => ({ id: uid(), type: "img", layout: "single", mt8: false, figure: false, caption: "", images: [{ path: "", alt: "" }] });
const mkMap = () => ({ id: uid(), type: "map", src: "", title: "", mt8: false });

// ─── Code generation ──────────────────────────────────────────────────────────
function genConfig({ title, cardDesc, category, subCats, tags, series, url, img, date }) {
  const sub  = subCats.length ? `["${subCats.join('", "')}"]` : "[]";
  const tagA = tags.length    ? `["${tags.map(escDq).join('", "')}"]` : "[]";
  return `[
    "title"         => "${escDq(title)}",
    "desc"          => "${escDq(cardDesc)}",
    "category_name" => "${CAT_NAMES[category]}",
    "category"      => "${category}",
    "sub_category"  => ${sub},
    "tags"          => ${tagA},
    "series"        => ${series ? `"${escDq(series)}"` : "null"},
    "url"           => "${escDq(url)}",
    "img"           => "${escDq(img)}",
    "date"          => "${date}"
],`;
}

const S3 = "            ";
const S4 = "                ";
const S5 = "                    ";

function genImgDiv(b, divInd, imgInd) {
  let cls = b.mt8 ? ' class="mt-8"' : "";
  if (b.layout === "grid2") cls = ` class="grid grid-cols-2${b.mt8 ? " mt-8" : ""}"`;
  if (b.layout === "grid3") cls = ` class="grid grid-cols-3${b.mt8 ? " mt-8" : ""}"`;
  if (b.layout === "row")   cls = ` class="row-container${b.mt8 ? " mt-8" : ""}"`;
  const imgs = b.images.map(im => `${imgInd}<img src="{{ asset('${im.path}') }}" alt="${im.alt}">`).join("\n");
  return `${divInd}<div${cls}>\n${imgs}\n${divInd}</div>`;
}

function genBlock(b) {
  if (b.type === "h") return `${S3}<${b.level}>${b.text}</${b.level}>`;
  if (b.type === "p") {
    const inner = b.text.split("\n").map((l, i, a) => l + (i < a.length - 1 ? "<br>" : "")).join(`\n${S4}`);
    return `${S3}<p>\n${S4}${inner}\n${S3}</p>`;
  }
  if (b.type === "img") {
    if (b.figure) {
      return `${S3}<figure>\n${genImgDiv(b, S4, S5)}\n${S4}<figcaption class="break-all py-2">${b.caption}</figcaption>\n${S3}</figure>`;
    }
    return genImgDiv(b, S3, S4);
  }
  if (b.type === "map") {
    const mt = b.mt8 ? `\n${S4}class="mt-8"` : "";
    return `${S3}<x-google-map${mt}\n${S4}src="${b.src}" \n${S4}title="${b.title}" \n${S3}/>`;
  }
  return "";
}

function genBlade(m, sections) {
  const hasRow = sections.some(s => s.blocks.some(b => b.type === "img" && b.layout === "row"));
  const body   = sections.map(s =>
    `        <section>\n${s.blocks.map(genBlock).join("\n")}\n        </section>`
  ).join("\n\n");

  let out = `@extends('layouts.app')
@section('title', 'おとくい！プラッツカルト！_${escSq(m.htmlTitle)}_отаку_и_плацкарт!!')
@section('content')

    @include('components.article-hero', [
        'desc' => "${escDq(m.heroDesc)}",
    ])

    @include('components.pager-btn')


    <main class="article">
${body}
    </main>

    @include('components.pager-btn')
    
@endsection`;

  if (hasRow) out += `
@push('scripts')
<script>
    document.querySelectorAll('.row-container img').forEach(img => {
        const update = () => {
            const ratio = img.naturalWidth / img.naturalHeight;
            if (ratio) img.style.setProperty('--ratio', ratio);
        };
        if (img.complete) update();
        else img.onload = update;
    });
</script>
@endpush`;

  return out;
}

// ─── Drag-and-drop hook ───────────────────────────────────────────────────────
function useDnD(items, setItems) {
  const dragIdx = useRef(null);
  const overIdx = useRef(null);

  const onDragStart = (i) => (e) => {
    dragIdx.current = i;
    e.dataTransfer.effectAllowed = "move";
  };
  const onDragOver = (i) => (e) => {
    e.preventDefault();
    overIdx.current = i;
  };
  const onDrop = (e) => {
    e.stopPropagation();
    const from = dragIdx.current;
    const to   = overIdx.current;
    if (from === null || to === null || from === to) return;
    const next = [...items];
    const [moved] = next.splice(from, 1);
    next.splice(to, 0, moved);
    setItems(next);
    dragIdx.current = null;
    overIdx.current = null;
  };
  const onDragEnd = () => { dragIdx.current = null; overIdx.current = null; };

  const itemProps = (i) => ({
    draggable: true,
    onDragStart: onDragStart(i),
    onDragOver:  onDragOver(i),
    onDrop,
    onDragEnd,
  });

  return { itemProps };
}

// ─── UI primitives ────────────────────────────────────────────────────────────
const Lbl = ({ children }) => (
  <label className="block text-xs text-slate-300 font-bold uppercase tracking-widest mb-1.5">{children}</label>
);
const DotLbl = ({ color, children }) => (
  <label className="flex items-center gap-1.5 text-xs text-slate-300 font-bold uppercase tracking-widest mb-1.5">
    <span className={`inline-block w-2 h-2 rounded-full shrink-0 ${color}`} />
    {children}
  </label>
);
const field = "w-full font-bold border rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-yellow focus:border-yellow placeholder:font-normal";

const TI = ({ label, value, onChange, placeholder, className = "", inputClass = "" }) => (
  <div className={className}>
    {label && <Lbl>{label}</Lbl>}
    <input value={value} onChange={e => onChange(e.target.value)} placeholder={placeholder} className={`${field} ${inputClass}`} />
  </div>
);
const TA = ({ label, value, onChange, rows = 3, placeholder, className = "", inputClass = "" }) => (
  <div className={className}>
    {label && <Lbl>{label}</Lbl>}
    <textarea value={value} onChange={e => onChange(e.target.value)} rows={rows} placeholder={placeholder} className={`${field} resize-y ${inputClass}`} />
  </div>
);
const Sel = ({ label, value, onChange, options, className = "", inputClass = "" }) => (
  <div className={className}>
    {label && <Lbl>{label}</Lbl>}
    <select value={value} onChange={e => onChange(e.target.value)} className={`${field} cursor-pointer ${inputClass}`}>
      {options.map(o => <option key={o.value} value={o.value} className="text-font bg-base">{o.label}</option>)}
    </select>
  </div>
);
const Chk = ({ label, checked, onChange }) => (
  <label className={`flex items-center gap-2 text-sm cursor-pointer select-none group ${checked ? "text-base" : ""}`}>
    <div
      className={`w-4 h-4 rounded border flex items-center justify-center transition-colors ${checked ? "bg-yellow border-yellow" : "group-hover:border-yellow"}`}
      onClick={() => onChange(!checked)}>
      {checked && <svg width="10" height="8" viewBox="0 0 10 8"><path d="M1 4l3 3 5-6" stroke="white" strokeWidth="1.5" fill="none" strokeLinecap="round"/></svg>}
    </div>
    {label}
  </label>
);
const Btn = ({ onClick, children, variant = "ghost" }) => {
  const s = {
    ghost:   "border border-slate-400 hover:border-others hover:text-yellow",
    primary: "bg-yellow font-bold shadow cursor-pointer",
    danger:  "text-slate-600 hover:text-red-400",
  };
  return <button onClick={onClick} className={`text-sm rounded px-3 py-1.5 transition-colors ${s[variant]}`}>{children}</button>;
};

// ─── DragHandle ───────────────────────────────────────────────────────────────
const DragHandle = () => (
  <div className="cursor-grab active:cursor-grabbing hover:text-yellow px-1 select-none" title="ドラッグして並び替え">
    <svg width="10" height="16" viewBox="0 0 10 16" fill="currentColor">
      <circle cx="3" cy="3"  r="1.5"/><circle cx="7" cy="3"  r="1.5"/>
      <circle cx="3" cy="8"  r="1.5"/><circle cx="7" cy="8"  r="1.5"/>
      <circle cx="3" cy="13" r="1.5"/><circle cx="7" cy="13" r="1.5"/>
    </svg>
  </div>
);

// ─── Image editor ─────────────────────────────────────────────────────────────
function ImgEditor({ b, set }) {
  const setLayout = (layout) => {
    let imgs = [...b.images];
    if (layout === "single") imgs = imgs.slice(0, 1);
    if (layout === "grid2")  imgs = [...imgs, { path: "", alt: "" }].slice(0, 2);
    if ((layout === "grid3" || layout === "row") && imgs.length < 2) imgs.push({ path: "", alt: "" });
    set({ ...b, layout, images: imgs });
  };
  const setImg = (i, k, v) => set({ ...b, images: b.images.map((im, j) => j === i ? { ...im, [k]: v } : im) });
  const canAdd = b.layout === "grid3" || b.layout === "row";
  const canDel = canAdd && b.images.length > 2;

  return (
    <div className="space-y-3">
      <div className="flex flex-wrap gap-3 items-end">
        <Sel label="レイアウト" value={b.layout} onChange={setLayout}
          options={[
            { value: "single", label: "１枚" },
            { value: "grid2",  label: "２枚並び（同比率）" },
            { value: "grid3",  label: "３枚以上（同比率）" },
            { value: "row",    label: "複数枚（比率が違う）" },
          ]} className="min-w-48" inputClass="text-base border-font" />
        <div className="flex gap-4 pb-1">
          <Chk label="上余白 mt-8" checked={b.mt8}    onChange={v => set({ ...b, mt8: v })} />
          <Chk label="figure"      checked={b.figure} onChange={v => set({ ...b, figure: v })} />
        </div>
      </div>
      {b.images.map((im, i) => (
        <div key={i} className="border rounded p-3 space-y-2">
          <div className="flex justify-between items-center">
            <span className="text-xs">画像 {i + 1}</span>
            {canDel && <Btn variant="danger" onClick={() => set({ ...b, images: b.images.filter((_, j) => j !== i) })}>削除</Btn>}
          </div>
          <TI placeholder="images/china2026/photo.jpg" value={im.path} onChange={v => setImg(i, "path", v)} inputClass="text-base border-font placeholder:text-font" />
          <TI placeholder="alt テキスト" value={im.alt} onChange={v => setImg(i, "alt", v)} inputClass="text-base border-font placeholder:text-font" />
        </div>
      ))}
      {canAdd && (
        <button onClick={() => set({ ...b, images: [...b.images, { path: "", alt: "" }] })}
          className="text-sm text-domestic hover:text-yellow">+ 画像を追加</button>
      )}
      {b.figure && (
        <TI label="figcaption" value={b.caption} onChange={v => set({ ...b, caption: v })} placeholder="画像の説明文" inputClass="text-base border-font placeholder:text-font" />
      )}
    </div>
  );
}

// ─── Block editor ─────────────────────────────────────────────────────────────
const BLOCK_INFO = {
  h:   { label: "見出し",       accent: "border-main", dot: "bg-main" },
  p:   { label: "段落",         accent: "border-foreign", dot: "bg-foreign" },
  img: { label: "画像",         accent: "border-domestic",    dot: "bg-domestic" },
  map: { label: "Googleマップ", accent: "border-others",  dot: "bg-others" },
};

function BlockEditor({ b, set, onDel, dragProps }) {
  const { label, accent, dot } = BLOCK_INFO[b.type];
  return (
    <div {...dragProps} className={`border-l-2 ${accent} bg-slate-800/80 rounded-r-lg p-3 mb-2 shadow-sm`}>
      <div className="flex items-center justify-between mb-3">
        <div className="flex items-center gap-1">
          <DragHandle />
          <div className={`w-2 h-2 rounded-full ${dot}`} />
          <span className="text-[11px] font-bold uppercase tracking-widest text-slate-300 ml-1">{label}</span>
        </div>
        <button onClick={onDel} className="p-1 text-slate-300 hover:text-red-400 text-xs">✕</button>
      </div>

      {b.type === "h" && (
        <div className="flex gap-2">
          <Sel value={b.level} onChange={v => set({ ...b, level: v })}
            options={[{ value: "h2", label: "H2 大見出し" }, { value: "h3", label: "H3 小見出し" }]}
            className="w-36" inputClass="text-base border-font" />
          <TI className="flex-1" value={b.text} onChange={v => set({ ...b, text: v })} placeholder="見出しテキスト" inputClass="text-base border-font placeholder:text-font" />
        </div>
      )}
      {b.type === "p" && (
        <TA value={b.text} onChange={v => set({ ...b, text: v })} rows={4} placeholder="本文（改行は自動で <br> に変換）" inputClass="text-base border-font placeholder:text-font" />
      )}
      {b.type === "img" && <ImgEditor b={b} set={set} />}
      {b.type === "map" && (
        <div className="space-y-2">
          <TI label="src" value={b.src} onChange={v => set({ ...b, src: v })} placeholder="https://www.google.com/maps/embed?pb=..." inputClass="text-base border-font placeholder:text-font" />
          <div className="flex gap-3 items-end">
            <TI label="title" value={b.title} onChange={v => set({ ...b, title: v })} placeholder="撮影地" className="flex-1" inputClass="text-base border-font placeholder:text-font" />
            <div className="pb-1"><Chk label="mt-8" checked={b.mt8} onChange={v => set({ ...b, mt8: v })} /></div>
          </div>
        </div>
      )}
    </div>
  );
}

// ─── Section editor ───────────────────────────────────────────────────────────
function SectionEd({ sec, setSec, onDel, dragProps, idx }) {
  const { itemProps: blkDrag } = useDnD(sec.blocks, (next) => setSec({ ...sec, blocks: next }));
  const updBlk = (id, nb) => setSec({ ...sec, blocks: sec.blocks.map(b => b.id === id ? nb : b) });
  const delBlk = (id)      => setSec({ ...sec, blocks: sec.blocks.filter(b => b.id !== id) });
  const addBlk = (type)    => {
    const f = { h: mkH, p: mkP, img: mkImg, map: mkMap };
    setSec({ ...sec, blocks: [...sec.blocks, f[type]()] });
  };

  return (
    <div {...dragProps} className="bg-base rounded-xl p-4 mb-4 shadow-xl">
      <div className="flex items-center justify-between mb-4">
        <div className="flex items-center gap-2">
          <DragHandle />
          <span className="text-xs font-bold uppercase tracking-widest">
            &lt;section&gt; {idx + 1}
          </span>
        </div>
        <button onClick={onDel} className="text-xs text-red-800 hover:text-red-400 transition-colors">
          セクション削除
        </button>
      </div>

      {sec.blocks.map((b, i) => (
        <BlockEditor key={b.id} b={b}
          set={nb => updBlk(b.id, nb)}
          onDel={() => delBlk(b.id)}
          dragProps={blkDrag(i)}
        />
      ))}

      <div className="flex gap-2 flex-wrap mt-3 pt-3 border-t">
        {[["h", "+ 見出し"], ["p", "+ 段落"], ["img", "+ 画像"], ["map", "+ マップ"]].map(([t, l]) => (
          <button key={t} onClick={() => addBlk(t)}
            className="text-xs border border-dashed hover:border-yellow hover:bg-yellow hover:text-base hover:font-bold rounded px-3 py-1.5 transition-colors">
            {l}
          </button>
        ))}
      </div>
    </div>
  );
}

// ─── Code panel ───────────────────────────────────────────────────────────────
function CodePanel({ label, code }) {
  const [done, setDone] = useState(false);
  const codeRef = useRef(null);

  useEffect(() => {
    if (codeRef.current && window.hljs) {
      // 再ハイライト時に前回の結果をリセット
      codeRef.current.removeAttribute('data-highlighted');
      window.hljs.highlightElement(codeRef.current);
    }
  }, [code]); // code が変わるたびに再実行

  const copy = () => {
    navigator.clipboard.writeText(code);
    setDone(true);
    setTimeout(() => setDone(false), 2000);
  };

  return (
    <div>
      <div className="flex justify-between items-center mb-2">
        <span className="text-xs break-all">{label}</span>
        <button onClick={copy}
          className={`text-xs px-4 py-1.5 rounded font-bold transition-all shrink-0 ml-3 ${done ? "bg-main text-base" : "bg-yellow hover:brightness-110"}`}>
          {done ? "✓ コピー済み" : "コピー"}
        </button>
      </div>
      <pre className="rounded-lg overflow-auto text-xs leading-relaxed shadow">
        <code ref={codeRef} className="language-php">{code}</code>
      </pre>
    </div>
  );
}

const Card = ({ title, children }) => (
  <div className="bg-base shadow-xl rounded-xl p-6 mb-5">
    {title && <h2 className="text-xs font-bold uppercase tracking-widest mb-5 pb-3 border-b">{title}</h2>}
    {children}
  </div>
);

// ─── Main App ─────────────────────────────────────────────────────────────────
export default function App() {
  const [title,     setTitle]     = useState("");
  const [cardDesc,  setCardDesc]  = useState("");
  const [heroDesc,  setHeroDesc]  = useState("");
  const [htmlTitle, setHtmlTitle] = useState("");
  const [category,  setCategory]  = useState("foreign");
  const [subCats,   setSubCats]   = useState([]);
  const [tags,      setTags]      = useState([]);
  const [tagInput,  setTagInput]  = useState("");
  const [series,    setSeries]    = useState("");
  const [url,       setUrl]       = useState("");
  const [img,       setImg]       = useState("");
  const [date,      setDate]      = useState("");
  const [sections,  setSections]  = useState([mkSection()]);
  const [tab,       setTab]       = useState("form");

  const { itemProps: secDrag } = useDnD(sections, setSections);

  const addTag = () => {
    const t = tagInput.trim();
    if (t && !tags.includes(t)) setTags([...tags, t]);
    setTagInput("");
  };

  const updSec = (id, s) => setSections(secs => secs.map(x => x.id === id ? s : x));

  const meta       = { title, cardDesc, heroDesc, htmlTitle, category, subCats, tags, series, url, img, date };
  const configCode = genConfig(meta);
  const bladeCode  = genBlade(meta, sections);
  const bladeFile  = `resources/views/articles/${category}/${url || "SLUG"}.blade.php`;

  return (
    <div className="min-h-screen bg-[color-mix(in_srgb,var(--color-main),var(--color-base)_60%)]">

      {/* Header */}
      <div className="bg-[color-mix(in_srgb,var(--color-yellow),var(--color-base)_75%)] px-6 py-4 flex items-center justify-between sticky top-0 z-10">
        <div className="flex items-center gap-3">
          <span className="font-bold text-sm">記事作成</span>
        </div>
        <div className="flex gap-1">
          {[["form", "✏ 編集"], ["output", "⬡ 出力"]].map(([v, l]) => (
            <button key={v} onClick={() => setTab(v)}
              className={`px-4 py-1.5 rounded text-xs font-bold uppercase tracking-wider transition-colors ${tab === v ? "bg-yellow text-font" : "text-font hover:text-slate-200"}`}>
              {l}
            </button>
          ))}
        </div>
      </div>

      <div className="max-w-2xl mx-auto px-4 py-6">

        {tab === "form" && (
          <>
            <Card title="config/articles.php">
              <div className="border-l-2 border-main mb-4 bg-slate-800/80 rounded-r-lg py-3 px-4 shadow">
                <DotLbl color="bg-main">タイトル</DotLbl>
                <TI value={title} onChange={setTitle} placeholder="記事タイトル" inputClass="text-base border-font placeholder:text-font" />
              </div>
              <div className="border-l-2 border-main mb-4 bg-slate-800/80 rounded-r-lg py-3 px-4 shadow">
                <DotLbl color="bg-main">カード説明文（記事一覧の短い説明）</DotLbl>
                <TA value={cardDesc} onChange={setCardDesc} rows={2} inputClass="text-base border-font placeholder:text-font" />
              </div>
              <div className="border-l-2 border-main mb-4 bg-slate-800/80 rounded-r-lg py-3 px-4 shadow">
                <DotLbl color="bg-main">カテゴリ</DotLbl>
                <Sel value={category} onChange={setCategory} options={CATS} inputClass="text-base border-font" />
              </div>

              <div className="border-l-2 border-main mb-4 bg-slate-800/80 rounded-r-lg py-3 px-4 shadow">
                <DotLbl color="bg-main">サブカテゴリ</DotLbl>
                  <div className="flex gap-6">
                    {SUB.map(s => (
                      <Chk key={s.value} label={s.label} checked={subCats.includes(s.value)}
                        onChange={c => setSubCats(c ? [...subCats, s.value] : subCats.filter(x => x !== s.value))} />
                    ))}
                </div>
              </div>

              <div className="border-l-2 border-main mb-4 bg-slate-800/80 rounded-r-lg py-3 px-4 shadow">
                <DotLbl color="bg-main">タグ</DotLbl>
                <div className="flex flex-wrap gap-1.5 mb-2 min-h-6">
                  {tags.map(t => (
                    <span key={t} className="bg-yellow text-xs px-2 py-0.5 rounded flex items-center gap-1 shadow">
                      #{t}
                      <button onClick={() => setTags(tags.filter(x => x !== t))} className="hover:text-red-400 ml-0.5 leading-none">✕</button>
                    </span>
                  ))}
                </div>
                <div className="flex gap-2">
                  <input value={tagInput} onChange={e => setTagInput(e.target.value)}
                    onKeyDown={e => e.key === "Enter" && addTag()}
                    placeholder="タグを入力して Enter"
                    className={`${field} flex-1 text-base border-font placeholder:text-font`} />
                  <Btn variant="primary" onClick={addTag}>追加</Btn>
                </div>
              </div>

              <div className="border-l-2 border-main mb-4 bg-slate-800/80 rounded-r-lg py-3 px-4 shadow">
                <DotLbl color="bg-main">シリーズ（任意、なければ空欄）</DotLbl>
                <TI value={series} onChange={setSeries} placeholder="china2026" inputClass="text-base border-font placeholder:text-font" />
              </div>
              <div className="border-l-2 border-main mb-4 bg-slate-800/80 rounded-r-lg py-3 px-4 shadow">
                <DotLbl color="bg-main">URL スラッグ（英数字・アンダースコア・ハイフン）</DotLbl>
                <TI value={url} onChange={setUrl} placeholder="rujigou_noritetsu" inputClass="text-base border-font placeholder:text-font" />
              </div>
              <div className="border-l-2 border-main mb-4 bg-slate-800/80 rounded-r-lg py-3 px-4 shadow">
                <DotLbl color="bg-main">サムネイル画像パス</DotLbl>
                <TI value={img} onChange={setImg} placeholder="images/china2026/PKII2058.jpg" inputClass="text-base border-font placeholder:text-font" />
              </div>

              <div className="border-l-2 border-main mb-4 bg-slate-800/80 rounded-r-lg py-3 px-4 shadow">
                <DotLbl color="bg-main">投稿日</DotLbl>
                <div className="flex items-center gap-3">
                  <input type="date" onChange={e => {
                    const [y, mo, d] = (e.target.value ?? "").split("-");
                    if (y && mo && d) setDate(`${y}.${mo}.${d}`);
                  }} className={`${field} w-auto cursor-pointer border-font ${date ? 'text-base' : 'text-font'} [&::-webkit-calendar-picker-indicator]:invert-[0.5]`} />
                  {date && <span className="text-sm bg-yellow px-2 py-1 rounded shadow">{date}</span>}
                </div>
              </div>
            </Card>

            <Card title="記事ページ設定">
              <div className="border-l-2 border-main mb-4 bg-slate-800/80 rounded-r-lg py-3 px-4 shadow">
                <DotLbl color="bg-main">HTML タイトル</DotLbl>
                <TI value={htmlTitle} onChange={setHtmlTitle} placeholder="タイトル" inputClass="text-base border-font placeholder:text-font" />
              </div>
              <div className="border-l-2 border-main bg-slate-800/80 rounded-r-lg py-3 px-4 shadow">
                <DotLbl color="bg-main">article-hero 説明文（改行可）</DotLbl>
                <TA value={heroDesc} onChange={setHeroDesc} rows={3} placeholder="..." inputClass="text-base border-font placeholder:text-font" />
              </div>
            </Card>

            <div className="mb-2 flex items-center justify-between">
              <h2 className="text-xs uppercase tracking-widest">本文ブロック</h2>
              <p className="text-xs">☰ をドラッグして並び替え</p>
            </div>

            {sections.map((sec, i) => (
              <SectionEd key={sec.id} idx={i} sec={sec}
                setSec={s => updSec(sec.id, s)}
                onDel={() => setSections(sections.filter(s => s.id !== sec.id))}
                dragProps={secDrag(i)}
              />
            ))}

            <button onClick={() => setSections([...sections, mkSection()])}
              className="block mx-auto my-8 border-2 border-dashed bg-[color-mix(in_srgb,var(--color-main),var(--color-base)_20%)] text-base font-bold hover:text-font hover:border-yellow hover:bg-yellow rounded-xl py-2 px-4 text-xs uppercase tracking-widest transition-colors shadow-lg">
              ＋ セクションを追加
            </button>
          </>
        )}

        {tab === "output" && (
          <div className="space-y-5">
            <Card>
              <CodePanel label="config/articles.php に追加するコード" code={configCode} />
            </Card>
            <Card>
              <CodePanel label={bladeFile} code={bladeCode} />
            </Card>
            <p className="text-xs text-base text-center pb-4">
              bladeファイルは resources/views/articles/{category}/ に保存してください
            </p>
          </div>
        )}
      </div>
    </div>
  );
}

// ─── Mount（Laravel の making.blade.php 用）───────────────────────────────────
const container = document.getElementById("article-builder-root");
if (container) {
    // HMR で再実行されたとき既存の root を再利用する
    if (!container._reactRoot) {
        container._reactRoot = createRoot(container);
    }
    container._reactRoot.render(<App />);
}
