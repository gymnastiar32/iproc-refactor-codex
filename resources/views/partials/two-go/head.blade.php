    @php
        $isId = app()->getLocale() === 'id';
        $pageUrl = $isId ? '/id/iproc-2go' : '/iproc-2go';
        $description = __('two_go.meta.description');
        $title = __('two_go.meta.title');
    @endphp
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="robots" content="index, follow">
    <meta name="description" content="{{ $description }}" />
    <meta name="author" content="iproc.adw.co.id" />
    <meta name="keywords"
        content="eProcurement, e-Procurement, Aplikasi eProcurement, ecatalog, e-katalog, Aplikasi eCatalog, Procurement 4.0, pengadaan, pengadaan barang / jasa pengadaan barang dan jasa, Pengadaan Indonesia, pengadaan pemerintah, pengadaan pengadaan pemerintah, pengadaan pertamina, pengadaan pln, Pelatihan pengadaaan, perpres pengadaan, Agen Pengadaan, tender, tender bumn, tender bumd, tender pemerintah, tender pertamina, tender pln, lelang, Info lelang, lelang bumn, lelang bumd, lelang pemerintah, lelang pertamina, lelang pln, Spend analysis tools, HPS, LKPP, ADW, IAPI" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="https://iproc.id/assets/img/og.png" />
    <meta property="og:url" content="{{ url($pageUrl) }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $title }}" />
    <meta property="og:description" content="{{ $description }}" />
    <meta property="og:image" content="https://iproc.id/lib/img/iproc-2-go/og.png" />
    <meta property="og:image:secure_url" content="https://iproc.id/lib/img/iproc-2-go/og.png" />
    <meta property="og:image:width" content="800" />
    <meta property="og:image:height" content="800" />
    <meta property="og:image:alt" content="iProc 2Go" />
    <meta property="og:image:type" content="image/png" />
    <meta property="fb:app_id" content="344927490666349" />
    <meta name="twitter:card" content="summary" />
    <meta property="twitter:domain" content="iproc.id/iproc-2go" />
    <meta property="twitter:url" content="{{ url($pageUrl) }}" />
    <meta name="twitter:title" content="{{ $title }}" />
    <meta name="twitter:description" content="{{ $description }}" />
    <meta name="twitter:image" content="https://iproc.id/assets/img/og.png" />
    <title>{{ $pageTitle ?? $title }}</title>
    <link rel="canonical" href="{{ url($pageUrl) }}" />
    <link rel="alternate" hreflang="id" href="{{ url('/id/iproc-2go') }}" />
    <link rel="alternate" hreflang="en" href="{{ url('/iproc-2go') }}" />
    <link rel="alternate" hreflang="x-default" href="{{ url('/iproc-2go') }}" />
    <link rel="shortcut icon" href="/lib/img/iproc-2-go/iproc-2-go.svg" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Inter" rel="stylesheet" />
    <link rel="stylesheet" href="/lib/css/flowbite.min.css" />
    <link rel="stylesheet" href="/lib/css/output.min.css" />
    <link rel="stylesheet" href="/lib/css/style.min.css">
    <link rel="stylesheet" href="/lib/css/iproc-2-go.css" defermedia="screen" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @verbatim
    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "iProc",
        "url": "https://iproc.id",
        "logo": "https://iproc.id/lib/img/Iproc.png",
        "description": "iProc is a Procurement 4.0 Platform to assist Procurement & SCM department in managing procurement, contract, vendor, inventory and asset management. Combination of iProc and pengadaan.com platform will unleash the power of digital in procurement and help the companies to rise DIGITAL TRANSFORMATION initiatives.",
        "sameAs": [
            "https://www.linkedin.com/company/anggada-duta-wisesa-pt"
        ],
        "contactPoint": [{
            "@type": "ContactPoint",
            "telephone": "+62 813-1587-0596",
            "contactType": "customer service",
            "areaServed": "ID",
            "availableLanguage": ["Indonesian", "English"]
        }]
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
