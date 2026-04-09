    @php($isId = app()->getLocale() === 'id')
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="robots" content="index, follow">
    <meta name="description" content="Solusi fleksibel, aman, dan hemat biaya untuk transformasi pengadaan Anda – tanpa infrastruktur
                        tambahan." />
    <meta name="author" content="iproc.adw.co.id" />
    <meta name="keywords"
        content="eProcurement, e-Procurement, Aplikasi eProcurement, ecatalog, e-katalog, Aplikasi eCatalog, Procurement 4.0, pengadaan, pengadaan barang / jasa pengadaan barang dan jasa, Pengadaan Indonesia, pengadaan pemerintah, pengadaan pengadaan pemerintah, pengadaan pertamina, pengadaan pln, Pelatihan pengadaaan, perpres pengadaan, Agen Pengadaan, tender, tender bumn, tender bumd, tender pemerintah, tender pertamina, tender pln, lelang, Info lelang, lelang bumn, lelang bumd, lelang pemerintah, lelang pertamina, lelang pln, Spend analysis tools, HPS, LKPP, ADW, IAPI" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="https://iproc.id/lib/img/iproc-cloud/og.jpg" />
    <meta property="og:url" content="{{ url($isId ? '/id/iproc-cloud' : '/iproc-cloud') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="iProc Cloud - Plug & Play e-Procurement" />
    <meta property="og:description" content="Solusi fleksibel, aman, dan hemat biaya untuk transformasi pengadaan Anda – tanpa infrastruktur
                        tambahan." />
    <meta property="og:image" content="https://iproc.id/lib/img/iproc-cloud/og.jpg" />
    <meta property="og:image:secure_url" content="https://iproc.id/lib/img/iproc-cloud/og.jpg" />
    <meta property="og:image:width" content="800" />
    <meta property="og:image:height" content="800" />
    <meta property="og:image:alt" content="iProc Cloud" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="fb:app_id" content="344927490666349" />
    <meta name="twitter:card" content="summary" />
    <meta property="twitter:domain" content="iproc.id/iproc-cloud" />
    <meta property="twitter:url" content="{{ url($isId ? '/id/iproc-cloud' : '/iproc-cloud') }}" />
    <meta name="twitter:title" content="iProc Cloud - Plug & Play e-Procurement" />
    <meta name="twitter:description" content="Solusi fleksibel, aman, dan hemat biaya untuk transformasi pengadaan Anda – tanpa infrastruktur
                        tambahan." />
    <meta name="twitter:image" content="https://iproc.id/lib/img/iproc-cloud/og.jpg" />
    <title>{{ $pageTitle ?? 'iProc cloud' }}</title>
    <link rel="canonical" href="{{ url($isId ? '/id/iproc-cloud' : '/iproc-cloud') }}" />
    <link rel="alternate" hreflang="id" href="{{ url('/id/iproc-cloud') }}" />
    <link rel="alternate" hreflang="en" href="{{ url('/iproc-cloud') }}" />
    <link rel="alternate" hreflang="x-default" href="{{ url('/iproc-cloud') }}" />
    <link rel="shortcut icon" href="/lib/img/iproc-cloud/iProc Cloud Vertical.svg" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Inter" rel="stylesheet" />
    <link rel="stylesheet" href="/lib/css/flowbite.min.css" />
    <link rel="stylesheet" href="/lib/css/output.css" />
    <link rel="stylesheet" href="/lib/css/style.min.css">
    <link rel="stylesheet" href="/lib/css/iproc-cloud.min.css" defermedia="screen" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css" />
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
        "url": "https://iproc.id",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "https://iproc.id/search?q={search_term_string}",
            "query-input": "required name=search_term_string"
        }
        }
    </script>
    @endverbatim
