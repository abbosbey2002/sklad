const btn=document.querySelector("#getb");

btn.addEventListener('click', async ()=>{
        let url="http://localhost:8000/User.php"
        const response = await fetch(url);
        const jsonData = await response.json();
        console.log(jsonData);
})