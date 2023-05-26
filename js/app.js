const contain=document.querySelector("#prod_cont");
const profitHeader=document.querySelector("#profit_header");
const amountheader=document.querySelector("#amount_header");

let data=[];
let profit=0;
let amount=0;

const url='http://localhost:8000/api.php'

async function init(){
    profit=0;
    amount=0
    try {
      let response = await fetch(url);
      let res = await response.json();
      data=res
      contain.innerHTML=''
      res.map((product, index) => {
        profit+=product.price*product.amount;
        amount+=product.amount;
        profitHeader.textContent=profit;
        amountheader.textContent=amount
        let html = `<tr>
            <th scope="row">${index}</th>
            <td scope="col">${product.title}</td>
            <td scope="col">${product.category}</td>
            <td scope="col">${product.sklad}</td>
            <td scope="col">${product.amount}</td>
            <td scope="col">$${product.price}</td>
          </tr>`;
  
        contain.insertAdjacentHTML('beforeend', html);
      });
    } catch (err) {
      console.error(err);
    }
  }

  init();

  async function getData(){

    try {
      let response = await fetch(url);
      let res = await response.json();
        data=res
    } catch (err) {
      console.error(err);
    }
  }
  
  async function redata(newdata){
    // contain.innerHTML=''
    const category=document.querySelector("#category").value;
    console.log(typeof category)
    profit=0;
    amount=0;
    newdata.map((product, index) => {
        let html
        if(category!='all' && category==product.category){
          profit+=product.price*product.amount;
          amount+=product.amount;
          profitHeader.textContent=profit;
          amountheader.textContent=amount;
          html = `<tr>
              <th  scope="row">${index}</th>
              <td scope="col">${product.title}</td>
              <td scope="col">${product.category}</td>
              <td scope="col">${product.sklad}</td>
              <td scope="col">${product.amount}</td>
              <td scope="col">$${product.price}</td>
            </tr>`;
            contain.insertAdjacentHTML('beforeend', html);
        }else if(category=='all'){
          profit+=product.price*product.amount;
          amount+=product.amount;
          profitHeader.textContent=profit;
          amountheader.textContent=amount
          html = `<tr>
              <th  scope="row">${index}</th>
              <td scope="col">${product.title}</td>
              <td scope="col">${product.category}</td>
              <td scope="col">${product.sklad}</td>
              <td scope="col">${product.amount}</td>
              <td scope="col">$${product.price}</td>
            </tr>`;
            contain.insertAdjacentHTML('beforeend', html);
        }

      });
   
  }




  const dateInp=document.querySelector("#inp_date");

  dateInp.addEventListener('keypress',async (e)=>{
    //   console.log(dateInp.value)
    if(e.keyCode==13){
      
      getData();
       contain.innerHTML=""
      newdata=[]
    data.map(product =>{
      if(product.import==null){
        newdata.push(product)
      }else{
        newimp=product.amount
        sellpro=product.amount
        table=product.import.split('/')
        selltable=product.sell.split('/')
        
        // selled
    selltable.map(value=>{
          let [dateStr, imp]=value.split('-');
          
            let [year, month, day] = dateStr.split(':');
            let [yearU, monthU, dayU] = dateInp.value.split('-');
            const date = new Date(year, month - 1, day);
            const userDate=new Date(yearU, monthU-1, dayU)
            if(day>0){
              check=date.toISOString().slice(0, 10) >= userDate.toISOString().slice(0, 10)
              if(check){
                // console.log('my_result=',(typeof imp)) 
                newimp+=Number(imp)
              }
            }
          })
        // end sellled
        // prixod
       table.map(value=>{
          let [dateStr, imp]=value.split('-');          
            let [year, month, day] = dateStr.split(':');
            let [yearU, monthU, dayU] = dateInp.value.split('-');
            const date = new Date(year, month - 1, day);
            const userDate=new Date(yearU, monthU-1, dayU)
            if(day>0){
              check=date.toISOString().slice(0, 10) >= userDate.toISOString().slice(0, 10)
              if(check){
                newimp-=imp
              }
            }
          })
          // end prixod
          if((newimp)<0){
            product.amount=0;
            newdata.push(product)
          }else{
            product.amount=newimp
            newdata.push(product)
          }
        } 

        // }
       
    })
    // console.log('newdata', newdata)
    redata(newdata)

    }

  })


//   console.log(d.toISOString().slice(0, 10)>f.toISOString().slice(0, 10) )