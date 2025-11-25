function getData(url) {
    return new Promise((resolve, reject) => {
        let xhr = new XMLHttpRequest();
        xhr.open("GET", url);
        xhr.onreadystatechange = () =>{
            if (xhr.readyState === 4){
                if (xhr.status === 200){
                    resolve(JSON.parse(xhr.responseText));
                }else {
                    let errorData;
                    try{
                        errorData = JSON.parse(xhr.responseText);
                    }catch (e){
                        errorData = {
                            status : xhr.status,
                        };
                    }
                }
            }
        }
    xhr.send();
    })
}

function postData(url, data) {
    return new Promise((resolve, reject) => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", url);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.onreadystatechange = () =>{
            if (xhr.readyState === 4){
                if (xhr.status === 200){
                    resolve(JSON.parse(xhr.responseText));
                }else {
                    let errorData;
                    try{
                        errorData = JSON.parse(xhr.responseText);
                    }catch (e){
                        errorData = {
                            status : xhr.status,
                        };
                    }
                }
            }
        }
    xhr.send(JSON.stringify(data));
    })
}

function putData(url, data) {
    return new Promise((resolve, reject) => {
        let xhr = new XMLHttpRequest();
        xhr.open("PUT", url);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.onreadystatechange = () =>{
            if (xhr.readyState === 4){
                if (xhr.status === 200){
                    resolve(JSON.parse(xhr.responseText));
                }else {
                    let errorData;
                    try{
                        errorData = JSON.parse(xhr.responseText);
                    }catch (e){
                        errorData = {
                            status : xhr.status,
                        };
                    }
                }
            }
        }
    xhr.send(JSON.stringify(data));
    })
}

function deleteData(url, data) {
    return new Promise((resolve, reject) => {
        let xhr = new XMLHttpRequest();
        xhr.open("DELETE", url);
        xhr.onreadystatechange = () =>{
            if (xhr.readyState === 4){
                if (xhr.status === 200){
                    resolve(JSON.parse(xhr.responseText));
                }else {
                    let errorData;
                    try{
                        errorData = JSON.parse(xhr.responseText);
                    }catch (e){
                        errorData = {
                            status : xhr.status,
                        };
                    }
                }
            }
        }
    xhr.send();
    })
}