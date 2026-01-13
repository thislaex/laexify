# Laexify Portfolio Template

[English](#english) | [Türkçe](#turkish)

---

## English

Modern, responsive and performance-optimized portfolio template with dark mode support.

**Current Version:** v1.1.1 (Stable)  
**Release Date:** January 14, 2026

## Preview

<img src="https://i.imgur.com/QPsjGH0.png">

## Features

### Performance Optimizations
- Inline critical CSS for faster First Contentful Paint
- Deferred loading of non-critical stylesheets (Tailwind, Font Awesome)
- Lazy loading for Chart.js with mobile-specific delays
- Intersection Observer implementation for GitHub API calls
- Optimized animations with translate3d and backface-visibility
- Smart resource hints with preconnect for critical CDNs
- Trusted Types policies for Content Security Policy compliance

### Mobile and Tablet Support
- Responsive hamburger menu with smooth animations
- Touch gesture support for swipe navigation
- Bottom navigation bar for mobile devices
- Tablet-specific layouts with optimized breakpoints
- Custom cursor disabled on touch devices
- Optimized button layouts for small screens

### Accessibility
- WCAG AA compliant color contrast ratios
- Unique aria-labels on all interactive elements
- Support for prefers-reduced-motion user preference
- Enhanced screen reader support with descriptive alt texts
- Semantic HTML structure throughout

### Visual Features
- Dark mode toggle with smooth transitions
- Glassmorphism effects on cards and containers
- 3D hover effects on project cards
- Parallax scrolling with performance optimizations
- Custom cursor for desktop devices
- Animated gradient borders and backgrounds

### Technical Implementation
- GitHub API integration with activity feed and repository showcase
- Interactive skills radar chart with Chart.js
- Career and education timeline
- Multi-language support (English/Turkish)
- SEO optimized with structured data
- Progressive Web App ready with manifest
- Service Worker support for offline functionality

## Performance Metrics

**Mobile Performance Improvements:**
- Performance Score: 37 to 65-75 (estimated)
- Largest Contentful Paint: 4.2s to 0.75s
- Cumulative Layout Shift: 0.255 to 0.006
- Page Weight Reduction: 779KB removed
- Critical Request Chain: 11.4s to 0s
- Total Blocking Time: 13.0s to 3s

## Installation

1. Download or clone the repository
2. Extract files to your web server directory
3. Open index.html in your browser
4. Ensure .htaccess is enabled for caching benefits

No build process or dependencies required.

## Customization

Edit the following files to personalize:
- `index.html` - Main content, sections, and personal information
- `cdn/assets/css/styles.css` - Custom styling and color scheme
- `cdn/img/` - Replace images with your own

### Quick Customization Guide

**Personal Information:**
- Update profile image in `cdn/img/profile.webp`
- Modify social media links in the hero section
- Edit skills and technologies in the skills section

**GitHub Integration:**
- Replace 'thislaex' with your GitHub username in the API calls
- Update Google Analytics ID if using analytics

**Color Scheme:**
- Modify CSS variables in the :root selector
- Update gradient colors in styles.css
- Adjust dark mode colors in [data-theme="dark"] selectors

## Browser Support

- Chrome/Edge 90+
- Firefox 88+
- Safari 14+
- Opera 76+

Modern browsers with ES6+ support required for optimal performance.

## File Structure

```
laexify/
├── index.html              # Main HTML file
├── .htaccess              # Server configuration
├── manifest.json          # PWA manifest
├── cdn/
│   ├── assets/
│   │   └── css/
│   │       └── styles.css # Custom styles
│   └── img/               # Image assets
└── README.md
```

## Caching Configuration

The template includes optimized caching rules via .htaccess:
- CSS/JavaScript: 6 months
- Images: 1 year
- HTML: 1 hour
- GZIP compression enabled

## License

Free to use for personal and commercial projects. Attribution appreciated but not required.

## Credits

Built with:
- Tailwind CSS
- Font Awesome
- Chart.js
- Google Fonts (Inter)

## Changelog

### v1.1.1 (January 14, 2026)
- Major mobile performance optimization
- Complete mobile and tablet responsive design
- Accessibility improvements (WCAG AA compliance)
- Layout shift fixes and LCP optimization
- GitHub API integration with smart loading
- Dark mode rendering improvements
- Enhanced caching strategy

### v1.1.0 (January 4, 2026)
- Initial feature-complete release
- Dark mode implementation
- GitHub integration
- Blog section
- Certificate showcase

## Support

For issues or questions, please open an issue on the GitHub repository.

---

## Turkish

Modern, responsive ve performans odaklı karanlık mod destekli portföy şablonu.

**Güncel Sürüm:** v1.1.1 (Kararlı)  
**Yayın Tarihi:** 14 Ocak 2026

## Önizleme

<img src="https://i.imgur.com/QPsjGH0.png">

## Özellikler

### Performans Optimizasyonları
- Daha hızlı First Contentful Paint için inline kritik CSS
- Kritik olmayan stil sayfalarının ertelenmiş yüklenmesi (Tailwind, Font Awesome)
- Chart.js için mobil cihazlara özel gecikmeli lazy loading
- GitHub API çağrıları için Intersection Observer implementasyonu
- translate3d ve backface-visibility ile optimize edilmiş animasyonlar
- Kritik CDN'ler için preconnect ile akıllı kaynak ipuçları
- Content Security Policy uyumluluğu için Trusted Types politikaları

### Mobil ve Tablet Desteği
- Yumuşak animasyonlu responsive hamburger menü
- Kaydırma navigasyonu için dokunmatik hareket desteği
- Mobil cihazlar için alt navigasyon çubuğu
- Optimize edilmiş kırılma noktalarıyla tablet-özel düzenler
- Dokunmatik cihazlarda devre dışı özel imleç
- Küçük ekranlar için optimize edilmiş buton düzenleri

### Erişilebilirlik
- WCAG AA uyumlu renk kontrast oranları
- Tüm etkileşimli öğelerde benzersiz aria etiketleri
- Prefers-reduced-motion kullanıcı tercihi desteği
- Açıklayıcı alt metinlerle geliştirilmiş ekran okuyucu desteği
- Kapsamlı semantik HTML yapısı

### Görsel Özellikler
- Yumuşak geçişlerle karanlık mod değiştirici
- Kartlar ve konteynerlerde glassmorphism efektleri
- Proje kartlarında 3D hover efektleri
- Performans optimizasyonlu parallax kaydırma
- Masaüstü cihazlar için özel imleç
- Animasyonlu gradient kenarlıklar ve arka planlar

### Teknik Uygulama
- Aktivite akışı ve depo vitrini ile GitHub API entegrasyonu
- Chart.js ile interaktif yetenekler radar grafiği
- Kariyer ve eğitim zaman çizelgesi
- Çoklu dil desteği (İngilizce/Türkçe)
- Yapılandırılmış veri ile SEO optimize edilmiş
- Manifest ile Progressive Web App hazır
- Çevrimdışı işlevsellik için Service Worker desteği

## Performans Metrikleri

**Mobil Performans İyileştirmeleri:**
- Performans Skoru: 37'den 65-75'e (tahmini)
- En Büyük İçerikli Boyama: 4.2s'den 0.75s'ye
- Kümülatif Düzen Kayması: 0.255'ten 0.006'ya
- Sayfa Ağırlığı Azalması: 779KB kaldırıldı
- Kritik İstek Zinciri: 11.4s'den 0s'ye
- Toplam Engelleme Süresi: 13.0s'den 3s'ye

## Kurulum

1. Depoyu indirin veya klonlayın
2. Dosyaları web sunucu dizininize çıkartın
3. Tarayıcınızda index.html'i açın
4. Önbellekleme avantajları için .htaccess'in etkin olduğundan emin olun

Yapı işlemi veya bağımlılık gerektirmez.

## Özelleştirme

Kişiselleştirmek için aşağıdaki dosyaları düzenleyin:
- `index.html` - Ana içerik, bölümler ve kişisel bilgiler
- `cdn/assets/css/styles.css` - Özel stillendirme ve renk şeması
- `cdn/img/` - Resimleri kendinizinkilerle değiştirin

### Hızlı Özelleştirme Kılavuzu

**Kişisel Bilgiler:**
- `cdn/img/profile.webp` içindeki profil resmini güncelleyin
- Hero bölümündeki sosyal medya bağlantılarını değiştirin
- Yetenekler bölümündeki becerileri ve teknolojileri düzenleyin

**GitHub Entegrasyonu:**
- API çağrılarında 'thislaex'i kendi GitHub kullanıcı adınızla değiştirin
- Analytics kullanıyorsanız Google Analytics kimliğini güncelleyin

**Renk Şeması:**
- :root seçicisindeki CSS değişkenlerini değiştirin
- styles.css içindeki gradient renklerini güncelleyin
- [data-theme="dark"] seçicilerinde karanlık mod renklerini ayarlayın

## Tarayıcı Desteği

- Chrome/Edge 90+
- Firefox 88+
- Safari 14+
- Opera 76+

Optimal performans için ES6+ destekli modern tarayıcılar gereklidir.

## Dosya Yapısı

```
laexify/
├── index.html              # Ana HTML dosyası
├── .htaccess              # Sunucu yapılandırması
├── manifest.json          # PWA manifest
├── cdn/
│   ├── assets/
│   │   └── css/
│   │       └── styles.css # Özel stiller
│   └── img/               # Görsel varlıklar
└── README.md
```

## Önbellekleme Yapılandırması

Şablon .htaccess aracılığıyla optimize edilmiş önbellekleme kuralları içerir:
- CSS/JavaScript: 6 ay
- Görseller: 1 yıl
- HTML: 1 saat
- GZIP sıkıştırma etkin

## Lisans

Kişisel ve ticari projeler için kullanımı ücretsizdir. Atıf takdir edilir ancak gerekli değildir.

## Katkıda Bulunanlar

Şununla oluşturuldu:
- Tailwind CSS
- Font Awesome
- Chart.js
- Google Fonts (Inter)

## Değişiklik Günlüğü

### v1.1.1 (14 Ocak 2026)
- Büyük mobil performans optimizasyonu
- Tam mobil ve tablet responsive tasarım
- Erişilebilirlik iyileştirmeleri (WCAG AA uyumluluğu)
- Düzen kayması düzeltmeleri ve LCP optimizasyonu
- Akıllı yükleme ile GitHub API entegrasyonu
- Karanlık mod render iyileştirmeleri
- Geliştirilmiş önbellekleme stratejisi

### v1.1.0 (4 Ocak 2026)
- İlk özellik tamamlanmış sürüm
- Karanlık mod implementasyonu
- GitHub entegrasyonu
- Blog bölümü
- Sertifika vitrini

## Destek

Sorunlar veya sorular için lütfen GitHub deposunda bir issue açın.
