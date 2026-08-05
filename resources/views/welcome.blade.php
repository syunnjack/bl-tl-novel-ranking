<!doctype html>
<html lang="ja">
<head>
  <meta name="google-site-verification" content="tbB-y8CKQ6ujEaTCaXUcsQ9evKJ8WNfHlkAcgCVyb_c" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BL・TL小説ランキング｜レビュー評価の高いFANZA官能小説まとめ</title>
  <meta name="description" content="FANZAのBL(ボーイズラブ)・TL(ティーンズラブ)小説をレビュー評価・件数順に自動集計。実際の評価データをもとにしたランキングで作品を探せます。18歳未満閲覧禁止。">
  <link rel="canonical" href="{{ url()->current() }}">
  <meta property="og:site_name" content="BL・TL小説ランキング">
  <meta property="og:type" content="website">
  <meta property="og:title" content="BL・TL小説ランキング｜レビュー評価の高いFANZA官能小説まとめ">
  <meta property="og:description" content="FANZAのBL・TL小説をレビュー評価順に自動集計するランキングサイトです。">
  <script type="application/ld+json">{"@@context":"https://schema.org","@@type":"WebSite","name":"BL・TL小説ランキング","url":"{{ url('/') }}"}</script>

  @if(config('services.ga4.id'))
  <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.ga4.id') }}"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '{{ config('services.ga4.id') }}');
  </script>
  @endif

  <style>
    :root { --ink:#f3eee7; --bg:#1b1712; --panel:#262019; --accent:#c9a15a; --accent2:#ff9ecf; --line:#3a3125; --muted:#ad9f8b;
      --bl:#8f9dff; --tl:#ff9ecf; }
    * { box-sizing:border-box; }
    body { margin:0; font-family:"Hiragino Mincho ProN","Yu Mincho",serif; color:var(--ink); background:var(--bg); line-height:1.8; }
    a { color:var(--accent); }
    .gate { position:fixed; inset:0; background:#0f0c09; display:flex; align-items:center; justify-content:center; padding:20px; z-index:20; }
    .gate section { max-width:420px; text-align:center; background:var(--panel); border:1px solid var(--line); border-radius:14px; padding:40px 28px; }
    .gate .badge { display:inline-block; background:var(--accent); color:#1f190f; font-weight:900; padding:4px 14px; border-radius:20px; font-size:.8rem; margin-bottom:16px; }
    .gate h1 { font-size:1.3rem; margin:10px 0; }
    .gate p { color:var(--muted); font-size:.9rem; }
    .gate button { margin-top:18px; background:var(--accent); color:#1f190f; border:0; padding:12px 28px; border-radius:8px; font-weight:800; cursor:pointer; }
    .gate a.exit { display:block; margin-top:12px; color:var(--muted); font-size:.85rem; }
    header { display:flex; align-items:center; justify-content:space-between; padding:16px 24px; border-bottom:1px solid var(--line); position:sticky; top:0; background:rgba(27,23,18,.92); backdrop-filter:blur(6px); z-index:5; }
    .logo { font-weight:900; text-decoration:none; color:var(--ink); font-size:1.1rem; }
    .logo span { color:var(--accent); }
    .age-badge { font-size:.7rem; border:1px solid var(--accent); color:var(--accent); padding:3px 10px; border-radius:20px; font-family:"Hiragino Sans",sans-serif; }
    .wrap { max-width:960px; margin:0 auto; padding:0 20px; }
    .hero { padding:44px 0 28px; }
    .eyebrow { color:var(--accent2); font-weight:800; font-size:.78rem; letter-spacing:.1em; font-family:"Hiragino Sans",sans-serif; }
    h1.main { font-size:1.85rem; line-height:1.5; margin:10px 0; }
    h1.main em { color:var(--accent); font-style:normal; }
    .lead { color:var(--muted); max-width:640px; font-size:.95rem; font-family:"Hiragino Sans",sans-serif; }
    .category-legend { display:flex; gap:10px; flex-wrap:wrap; margin-top:20px; font-family:"Hiragino Sans",sans-serif; }
    .cat-chip { display:flex; align-items:center; gap:6px; font-size:.8rem; color:var(--muted); }
    .dot { width:10px; height:10px; border-radius:50%; display:inline-block; }
    .updated { margin-top:14px; font-size:.8rem; color:var(--muted); font-family:"Hiragino Sans",sans-serif; }
    .updated b { color:var(--accent2); }
    section { padding:20px 0 40px; }
    .list { display:flex; flex-direction:column; gap:12px; }
    .row { display:flex; gap:16px; background:var(--panel); border:1px solid var(--line); border-radius:10px; padding:16px; align-items:center; }
    .row .rank-num { font-size:1.3rem; font-weight:900; color:var(--accent); width:2em; text-align:center; flex-shrink:0; }
    .row img { width:60px; height:80px; object-fit:cover; border-radius:4px; flex-shrink:0; background:#0f0c09; }
    .row .info { flex:1; min-width:0; }
    .row .cat-tag { display:inline-block; font-size:.68rem; font-weight:800; padding:2px 8px; border-radius:10px; color:#1f190f; margin-bottom:4px; font-family:"Hiragino Sans",sans-serif; }
    .row .title { font-size:.95rem; margin-bottom:4px; }
    .row .meta { font-size:.78rem; color:var(--muted); font-family:"Hiragino Sans",sans-serif; }
    .row .score { font-family:"Hiragino Sans",sans-serif; font-size:.85rem; color:var(--accent2); font-weight:800; white-space:nowrap; }
    .row a.go { flex-shrink:0; background:var(--accent); color:#1f190f; font-weight:800; padding:8px 16px; border-radius:8px; text-decoration:none; font-size:.82rem; font-family:"Hiragino Sans",sans-serif; }
    .empty { color:var(--muted); text-align:center; padding:60px 0; font-family:"Hiragino Sans",sans-serif; }
    footer { padding:30px 0 50px; color:var(--muted); font-size:.72rem; border-top:1px solid var(--line); font-family:"Hiragino Sans",sans-serif; }
    footer p { margin:6px 0; }
    @media (max-width: 560px) {
      .row { flex-wrap:wrap; }
      .row a.go { width:100%; text-align:center; }
    }
  </style>
</head>
<body>
  <div class="gate" id="age-gate">
    <section>
      <span class="badge">18+</span>
      <h1>年齢確認</h1>
      <p>このサイトはBL・TL小説(FANZAアフィリエイト)のレビューランキング情報を扱います。18歳未満の方はご利用いただけません。</p>
      <button onclick="document.getElementById('age-gate').style.display='none'">18歳以上です</button>
      <a class="exit" href="https://www.google.com/">退出する</a>
    </section>
  </div>

  <header>
    <a href="#top" class="logo">BL・TL<span>小説ランキング</span></a>
    <span class="age-badge">18歳以上限定</span>
  </header>

  <div class="wrap">
    <section class="hero" id="top">
      <p class="eyebrow">REVIEW-RANKED BL / TL NOVELS</p>
      <h1 class="main">レビュー評価の高い順で、<br><em>読む価値のある一冊</em>を。</h1>
      <p class="lead">FANZA公式アフィリエイトAPIから取得した実際のレビュー評価・件数をもとに、BL(ボーイズラブ)・TL(ティーンズラブ)小説をランキング形式で紹介しています(3件以上のレビューがある作品のみ掲載)。</p>
      @if($categoryCounts->isNotEmpty())
      <div class="category-legend">
        @foreach($categoryCounts as $cat => $count)
        <span class="cat-chip"><span class="dot" style="background:var(--{{ strtolower($cat) }})"></span>{{ $cat }} <b>{{ $count }}件</b></span>
        @endforeach
      </div>
      @endif
      @if($lastUpdated)
      <p class="updated">最終更新: <b>{{ \Illuminate\Support\Carbon::parse($lastUpdated)->timezone('Asia/Tokyo')->format('Y/m/d H:i') }}</b>(自動更新)</p>
      @endif
    </section>

    <section>
      @if($items->isEmpty())
        <p class="empty">現在ランキング情報を準備中です。しばらくしてから再度ご確認ください。</p>
      @else
        <div class="list">
          @foreach($items as $i => $item)
          <div class="row">
            <div class="rank-num">{{ $i + 1 }}</div>
            @if($item->image_url)
            <img src="{{ $item->image_url }}" alt="{{ $item->title }}" loading="lazy">
            @endif
            <div class="info">
              <span class="cat-tag" style="background:var(--{{ strtolower($item->category) }})">{{ $item->category }}</span>
              <div class="title">{{ $item->title }}</div>
              <div class="meta">{{ $item->author }}</div>
            </div>
            <div class="score">★{{ number_format($item->review_average, 1) }} ({{ $item->review_count }})</div>
            <a class="go" href="{{ $item->affiliate_url }}" target="_blank" rel="sponsored noopener">見る</a>
          </div>
          @endforeach
        </div>
      @endif
    </section>
  </div>

  <footer>
    <div class="wrap">
      <p>本サイトはFANZAアフィリエイトプログラムを利用し、DMM.com公式APIから取得したレビュー情報をもとに構成しています。詳細は必ずリンク先の公式ページでご確認ください。</p>
      <p>本サイトが紹介するリンクには広告(アフィリエイトリンク)を含みます。</p>
      <p>&copy; {{ date('Y') }} BL・TL小説ランキング</p>
    </div>
  </footer>
</body>
</html>
