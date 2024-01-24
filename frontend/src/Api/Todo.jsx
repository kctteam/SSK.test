import { apiClient } from "./ApiConfig";

export async function getList() {
    return apiClient.get(null, {
        params: {
            action: "list",
        },
    });
}

export async function getDelete(id) {
    return apiClient.get(null, {
        params: {
            action: "delete",
            id: id,
        },
    });
}

export async function postNote(note) {
    var qs = require("qs");
    return apiClient.post(null, qs.stringify(note));
}
