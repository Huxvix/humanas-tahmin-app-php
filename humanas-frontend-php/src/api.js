import axios from 'axios';
import.meta.env.VITE_API_BASE_URL;

const AxiosInstance = axios.create({
    baseURL: import.meta.env.VITE_API_BASE_URL,
    timeout: 100000, // 100 saniye sonra zaman aşımına uğrayacak (bunu bu kadar uzun tutmamın sebebi render'in bazen çok uzun bekletmesi)
    headers: {
        'Content-Type': 'application/json',
        accept: 'application/json',
    },
})

export default AxiosInstance;


