export function hasAuthenticated(){
    return localStorage.getItem('token') !== null ? true : false;
}