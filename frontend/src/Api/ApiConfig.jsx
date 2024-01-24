import axios from "axios";

const baseUrl = () => {
    //const host = window.location.host;
    const url = "http://localhost:8000/app.php?type=api";
    return url;
};

export const apiClient = axios.create({
    baseURL: baseUrl(),
});
