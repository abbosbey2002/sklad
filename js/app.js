const contain=document.querySelector("#prod_cont");

let data=[];

const url='http://localhost:8000/api.php'

contain.addEventListener('click', async () => {
    try {
      let response = await fetch(url);
      let res = await response.json();
      console.log(res)
        data=res
      res.map((product, index) => {
        let html = `<tr>
            <th scope="row">${index}</th>
            <td scope="col">${product.title}</td>
            <td scope="col">${product.category_id}</td>
            <td scope="col">${product.sklad_id}</td>
            <td scope="col">${product.amount}</td>
            <td scope="col">'$'${product.price}</td>
          </tr>`;
  
        contain.insertAdjacentHTML('beforeend', html);
      });
    } catch (err) {
      console.error(err);
    }
  });


  async function redata(newdata){
    
      newdata.map((product, index) => {
        let html = `<tr>
            <th scope="row">${index}</th>
            <td scope="col">${product.title}</td>
            <td scope="col">${product.category_id}</td>
            <td scope="col">${product.sklad_id}</td>
            <td scope="col">${product.amount}</td>
            <td scope="col">'$'${product.price}</td>
          </tr>`;
  
        contain.insertAdjacentHTML('beforeend', html);
      });
   
  }




  const dateInp=document.querySelector("#inp_date");

  dateInp.addEventListener('keypress', (e)=>{
    //   console.log(dateInp.value)
    if(e.keyCode==13){
      newdata=[]
    data.map(product =>{
      if(product.import==null){
        newdata.push(product)
      }else{

        table=product.import.split('/')
        newimp=product.amount
        table.map(value=>{
          let [dateStr, imp]=value.split('-');
          
            let [year, month, day] = dateStr.split(':');
            let [yearU, monthU, dayU] = dateInp.value.split('-');
            const date = new Date(year, month - 1, day);
            const userDate=new Date(yearU, monthU-1, dayU)
            if(day>0){
              check=date.toISOString().slice(0, 10) >= userDate.toISOString().slice(0, 10)
              if(check){
                console.log('db date', year, month, day)
                console.log('product',product);
                newimp=newimp-imp
              }
            }
          })
        } 
          product.amount=newimp
          newdata.push(product)

        // }
       
    })
    data=newdata
    console.log('newdata', newdata)
    redata(newdata)

    }

  })


  d=new Date()
  f=new Date()

//   console.log(d.toISOString().slice(0, 10)>f.toISOString().slice(0, 10) )