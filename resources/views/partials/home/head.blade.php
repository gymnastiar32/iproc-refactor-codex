    @php($isId = app()->getLocale() === 'id')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="robots" content="index, follow">
    <meta name="description"
        content="iProc is a PROCUREMENT 4.0 Platform to assist Procurement &amp; SCM department in managing procurement, contract, vendor, inventory and asset management. Combination of iProc and pengadaan.com platform will unleash the power of digital in procurement and help the companies to rise DIGITAL TRANSFORMATION initiatives">
    <meta name="author" content="iproc.adw.co.id">
    <meta name="keywords"
        content="eProcurement, e-Procurement, Aplikasi eProcurement, ecatalog, e-katalog, Aplikasi eCatalog, Procurement 4.0, pengadaan, pengadaan barang / jasa pengadaan barang dan jasa, Pengadaan Indonesia, pengadaan pemerintah, pengadaan pengadaan pemerintah, pengadaan pertamina, pengadaan pln, Pelatihan pengadaaan, perpres pengadaan, Agen Pengadaan, tender, tender bumn, tender bumd, tender pemerintah, tender pertamina, tender pln, lelang, Info lelang, lelang bumn, lelang bumd, lelang pemerintah, lelang pertamina, lelang pln, Spend analysis tools, HPS, LKPP, ADW, IAPI">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="https://iproc.id/assets/img/og.png">
    <meta property="og:url" content="{{ url($isId ? '/id' : '/') }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="iProc - Integrated Procurement 4.0 Platform">
    <meta property="og:description"
        content="iProc is a Procurement 4.0 Platform to assist Procurement &amp; SCM department in managing procurement, contract, vendor, inventory and asset management. Combination of iProc and pengadaan.com platform will unleash the power of digital in procurement and help the companies to rise DIGITAL TRANSFORMATION initiatives.">
    <meta property="og:image" content="https://iproc.id/assets/img/og.png">
    <meta property="fb:app_id" content="344927490666349">
    <meta name="twitter:card" content="summary">
    <meta property="twitter:domain" content="iproc.id">
    <meta property="twitter:url" content="{{ url($isId ? '/id' : '/') }}">
    <meta name="twitter:title" content="iProc - Integrated Procurement 4.0 Platform">
    <meta name="twitter:description"
        content="iProc is a Procurement 4.0 Platform to assist Procurement &amp; SCM department in managing procurement, contract, vendor, inventory and asset management. Combination of iProc and pengadaan.com platform will unleash the power of digital in procurement and help the companies to rise DIGITAL TRANSFORMATION initiatives.">
    <meta name="twitter:image" content="https://iproc.id/assets/img/og.png">
    <title>{{ $pageTitle ?? 'iProc - Platform Procurement 4.0 Terintegrasi' }}</title>
    <link rel="canonical" href="{{ url($isId ? '/id' : '/') }}" />
    <link rel="alternate" hreflang="id" href="{{ url('/id') }}" />
    <link rel="alternate" hreflang="en" href="{{ url('/') }}" />
    <link rel="alternate" hreflang="x-default" href="{{ url('/') }}" />
    <link rel="shortcut icon" href="/lib/img/iproc-icon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/lib/css/app.min.css">
    <link rel="stylesheet" href="/lib/css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css" media="print"
        onload="this.media='all'">
    <link rel="preload" as="image" href="https://img.youtube.com/vi/ugrnTcuBVZg/hqdefault.jpg"
        imagesrcset="https://img.youtube.com/vi/ugrnTcuBVZg/sddefault.jpg 640w, https://img.youtube.com/vi/ugrnTcuBVZg/hqdefault.jpg 1280w">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet" media="print" onload="this.media='all'">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" media="print" onload="this.media='all'">
    @verbatim
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "@id": "https://iproc.id/#organization",
            "name": "PT Anggada Duta Wisesa",
            "url": "https://iproc.id",
            "logo": "https://iproc.id/lib/img/Iproc.png",
            "brand": {
                "@type": "Brand",
                "name": "iProc"
            },
            "description": "iProc is a Procurement 4.0 Platform to assist Procurement & SCM department in managing procurement, contract, vendor, inventory and asset management. Combination of iProc and pengadaan.com platform will unleash the power of digital in procurement and help the companies to rise DIGITAL TRANSFORMATION initiatives.",
            "sameAs": [
                "https://www.linkedin.com/company/anggada-duta-wisesa-pt",
                "https://www.instagram.com/adw.consulting/",
                "https://www.crunchbase.com/organization/anggada-duta-wisesa"
            ],
            "contactPoint": [
                {
                "@type": "ContactPoint",
                "telephone": "+6281315870596",
                "contactType": "customer service",
                "areaServed": "ID",
                "availableLanguage": ["id", "en"]
                }
            ]
        }
    </script>
    @endverbatim

    @verbatim
    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "iProc",
        "url": "https://iproc.id"
        }
        </script>
    @endverbatim

    @verbatim
    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "VideoObject",
        "name": "Video", 
        "description": "iProc adalah platform Procurement 4.0 end-to-end yang menggabungkan e-procurement, tender digital, manajemen kontrak dan vendor, serta pengelolaan inventaris & aset dalam satu sistem terpadu. Bekerja sama dengan pengadaan.com untuk memperluas akses vendor dan meningkatkan efisiensi proses pengadaan. Cocok untuk departemen Procurement & SCM yang ingin mempercepat transformasi digital, mengurangi risiko, dan memperkuat kontrol pengeluaran.", 
        "thumbnailUrl": [
            "https://img.youtube.com/vi/fQZktJx6j-E/maxresdefault.jpg"
        ],
        "uploadDate": "2024-07-10T08:00:00+07:00",
        "duration": "PT5M10S", 
        "embedUrl": "https://www.youtube.com/embed/fQZktJx6j-E",
        "contentUrl": "https://www.youtube.com/watch?v=fQZktJx6j-E",
        "publisher": {
            "@type": "Organization",
            "name": "adw consulting",
            "logo": {
            "@type": "ImageObject",
            "url": "https://iproc.id/lib/img/Iproc.png"
            }
        }
        }
    </script>
    @endverbatim
