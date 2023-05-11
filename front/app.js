const btn=document.querySelector("#getb");
const cont=document.querySelector("#fake")

btn.addEventListener('click', async ()=>{
        let url="http://localhost:8000/User.php"
        const response = await fetch(url);
        const jsonData = await response.json();
        console.log(jsonData);
        
       
        jsonData.map((product)=>{
               html=`<div class="th main_rows">  
                                        <span class="span-1">${product.id}</span>
                                        <span class="span-2">${product.login}</span>
                                        <span class="span-3">${product.position}</span>
                                        <span class="span-4">${product.email}</span>
                                        <span class="span-5">${product.phone_number}</span>
                                        <span class="span-6">${product.password}</span>
                                        <div class="span-7 cont_btn">
                                            <button class="red_btn">Delete</button>
                                            <button class="green_btn">edit</button>
                                        </div>`

                                        cont.insertAdjacentHTML('beforeend', html)
        })


})


