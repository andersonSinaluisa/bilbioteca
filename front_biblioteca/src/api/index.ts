import axios from "axios";

const api = axios.create({
    baseURL: "http://localhost:8000/api/v1",
    headers: {
        "Content-Type": "application/json",
        "Authorization": "Bearer " + localStorage.getItem("token"),
    },
});

interface ResponseApi<T>{
    data: T;
    success: boolean;
    message: string;
}
export type {ResponseApi};

export default api;