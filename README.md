# Humanas Tahmin Uygulaması

Bu proje, Humanas için geliştirilmiş bir tahmin uygulamasıdır. Frontend React ile, backend vanilla PHP ile geliştirilmiştir.

## Gereksinimler

### Backend için:
- PHP 8.4
- Composer

### Frontend için:
- Node.js 22
- npm

## Kurulum Adımları

### Backend Kurulumu

1. Backend dizinine gidin:
```bash
cd humanas-backend-php
```

2. Composer bağımlılıklarını yükleyin:
```bash
composer install
```

5. PHP'nin yerleşik sunucusunu başlatın:
```bash
php -S localhost:8000
```

### Frontend Kurulumu

1. Frontend dizinine gidin:
```bash
cd ..
cd humanas-frontend-php
```

2. Bağımlılıkları yükleyin:
```bash
npm install
```

3. `.env` dosyasını oluşturun:
```bash
cp .env.example .env
```

4. `.env` dosyasını düzenleyin:
```
REACT_APP_API_URL=http://localhost:8000 (veya sizin backend URL'niz)
```

5. Geliştirme sunucusunu başlatın:
```bash
npm start dev

## API Endpointleri

- `GET /data` - Tahmin verilerini getirir
