{{-- Scripts condicionais baseados no consentimento de cookies --}}

@if(\App\Helpers\CookieHelper::analyticsAccepted())
    <!-- Google Analytics 4 -->
    @if(\App\Helpers\AnalyticsConfigHelper::isGoogleAnalyticsEnabled())
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ \App\Helpers\AnalyticsConfigHelper::getGoogleAnalyticsId() }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ \App\Helpers\AnalyticsConfigHelper::getGoogleAnalyticsId() }}', {
                'custom_map': {
                    'custom_parameter_1': 'user_type',
                    'custom_parameter_2': 'conversion_value'
                }
            });

            // Eventos personalizados
            function trackEvent(eventName, parameters = {}) {
                gtag('event', eventName, parameters);
            }

            // Evento de visualização de página
            trackEvent('page_view', {
                'page_title': document.title,
                'page_location': window.location.href,
                'user_type': 'visitor'
            });

            // Evento de scroll
            let scrollTracked = false;
            window.addEventListener('scroll', function() {
                if (!scrollTracked && window.scrollY > 500) {
                    trackEvent('scroll', {
                        'scroll_depth': '50%'
                    });
                    scrollTracked = true;
                }
            });

            // Evento de tempo na página
            setTimeout(function() {
                trackEvent('engagement_time', {
                    'engagement_time_msec': 30000
                });
            }, 30000);
        </script>
    @endif

    <!-- Hotjar -->
    @if(\App\Helpers\AnalyticsConfigHelper::isHotjarEnabled())
        <script>
            (function(h,o,t,j,a,r){
                h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:{{ \App\Helpers\AnalyticsConfigHelper::getHotjarId() }},hjsv:6};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
        </script>
    @endif
@endif

@if(\App\Helpers\CookieHelper::marketingAccepted())
    <!-- Facebook Pixel -->
    @if(\App\Helpers\AnalyticsConfigHelper::isFacebookPixelEnabled())
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{ \App\Helpers\AnalyticsConfigHelper::getFacebookPixelId() }}');
            fbq('track', 'PageView');

            // Eventos personalizados do Facebook
            function trackFacebookEvent(eventName, parameters = {}) {
                fbq('track', eventName, parameters);
            }

            // Evento de visualização de conteúdo
            trackFacebookEvent('ViewContent', {
                content_ids: ['laravel-prostarter'],
                content_type: 'product',
                value: {{ config('analytics.events.purchase_value') }},
                currency: '{{ config('analytics.events.currency') }}'
            });

            // Evento de interesse
            trackFacebookEvent('Lead', {
                content_name: '{{ config('analytics.events.product_name') }}',
                content_category: 'Laravel Course'
            });
        </script>
        <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id={{ \App\Helpers\AnalyticsConfigHelper::getFacebookPixelId() }}&ev=PageView&noscript=1"
        /></noscript>
    @endif

    <!-- Google Tag Manager -->
    @if(\App\Helpers\AnalyticsConfigHelper::isGTMEnabled())
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','{{ \App\Helpers\AnalyticsConfigHelper::getGTMId() }}');</script>
    @endif
@endif

{{-- Scripts essenciais (sempre carregados) --}}
<script>
    // Scripts essenciais que não precisam de consentimento
    console.log('Scripts essenciais carregados');
    
    // Função global para tracking de eventos
    window.trackConversion = function(eventType, value = null) {
        // Google Analytics
        if (typeof gtag !== 'undefined') {
            gtag('event', eventType, {
                'event_category': 'conversion',
                'event_label': 'Laravel ProStarter',
                'value': value || {{ config('analytics.events.purchase_value') }},
                'currency': '{{ config('analytics.events.currency') }}'
            });
        }
        
        // Facebook Pixel
        if (typeof fbq !== 'undefined') {
            fbq('track', eventType, {
                content_ids: ['laravel-prostarter'],
                content_type: 'product',
                value: value || {{ config('analytics.events.purchase_value') }},
                currency: '{{ config('analytics.events.currency') }}'
            });
        }
    };
</script>
