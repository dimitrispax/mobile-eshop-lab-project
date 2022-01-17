function reqListener () {
    console.log(this.responseText);
  }

  var oReq = new XMLHttpRequest(); // New request object
  let data;
  oReq.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      data = JSON.parse(this.responseText);
      console.log(data[0]);
      let row = document.getElementById('row');
      
      data.forEach(element => {       
        
        let div = document.createElement('div');
        div.classList.add('col-md-4', 'd-flex', 'align-items-stretch');
        row.appendChild(div);

        //   <div class="card p-card bg-white p-2 rounded px-3 mt-5">
        let card = document.createElement('div');
        card.classList.add('card', 'p-card', 'bg-white', 'p-2', 'rounded', 'px-3', 'mt-5');
        div.appendChild(card);

        //   <div class="align-items-center credits">
        let items = document.createElement('div');
        items.classList.add('align-items-center', 'credits');
        card.appendChild(items);

        //  <img class="card-img-top"
        let img = document.createElement('img');
        img.classList.add('card-img-top');
        img.src = data[0].photoURL;
        items.appendChild(img);

        // <span class="text-black-50 ml-2">
        let span = document.createElement('span');
        span.classList.add('text-black-50', 'ml-2');
        items.appendChild(span);

        // <h5 class="mt-2 d-flex flex-column">
        let h5 = document.createElement('h5');
        h5.classList.add('mt-2', 'd-flex', 'flex-column');
        h5.textContent = data[0].model;
        card.appendChild(h5);
        
        // <span class="d-block mb-3">
        let spanB = document.createElement('span');
        spanB.classList.add('d-block', 'mb-3');
        spanB.textContent = "CPU: " + data[0].cpu;
        card.appendChild(spanB);

       

        // button
        let btn = document.createElement('button');
        btn.classList.add('btn', 'btn-outline-light', 'mt-auto', 'mb-2');
        btn.textContent = 'Add to basket';
        card.appendChild(btn);
      });



     

    }
      // console.log(this.responseText); // Will alert: 42
  };
  oReq.open("get", "../get_phones.php", true);    
  
  oReq.send();
