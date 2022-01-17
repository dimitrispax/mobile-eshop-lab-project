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
        div.classList.add('col-lg-4','mb-3', 'd-flex', 'align-items-stretch');
        row.appendChild(div);

        //   <div class="card p-card bg-white p-2 rounded px-3 mt-5">
        let card = document.createElement('div');
        card.classList.add('card', 'p-card', 'bg-white', 'p-2', 'rounded', 'px-3', 'mt-5');
        div.appendChild(card);

        //   <div class="align-items-center credits">
        let items = document.createElement('div');
        items.classList.add('align-items-center', 'credits');
        card.appendChild(items);

        let d_flex = document.createElement('div');
        d_flex.classList.add('d-flex', 'flex-column');
        card.appendChild(d_flex);

        //  <img class="card-img-top"
        let img = document.createElement('img');
        img.classList.add('image');
        img.src = element.photoURL;
        d_flex.appendChild(img);

        // <span class="text-black-50 ml-2">
        let span = document.createElement('span');
        span.classList.add('text-black-50', 'ml-2');
        items.appendChild(span);

        // <h5 class="mt-2 d-flex flex-column">
        let h5 = document.createElement('h5');
        h5.classList.add('mt-2', 'd-flex', 'flex-column');
        h5.textContent = element.model;
        card.appendChild(h5);

       
        let pCpu = document.createElement('p');
        pCpu.textContent = "CPU: ";
        card.appendChild(pCpu);

        let spanCPU = document.createElement('span');
        spanCPU.textContent = element.cpu;
        spanCPU.classList.add('info-left');
        pCpu.appendChild(spanCPU);


        let pScreenSize = document.createElement('p');
        pScreenSize.textContent = "Screen Size: ";
        card.appendChild(pScreenSize);

        let spanScreen = document.createElement('span');
        spanScreen.textContent = element.screenSize;
        spanScreen.classList.add('info-left');
        pScreenSize.appendChild(spanScreen);

        let pCamera = document.createElement('p');
        pCamera.textContent = "Camera: ";
        card.appendChild(pCamera);

        let spanCamera = document.createElement('span');
        spanCamera.textContent = element.camera;
        spanCamera.classList.add('info-left');
        pCamera.appendChild(spanCamera);

        let pBattery = document.createElement('p');
        pBattery.textContent = "Battery: " ;
        card.appendChild(pBattery);

        let spanBattery = document.createElement('span');
        spanBattery.textContent = element.battery;
        spanBattery.classList.add('info-left');
        pBattery.appendChild(spanBattery);

        let pRam = document.createElement('p');
        pRam.textContent = "Ram: ";
        card.appendChild(pRam);

        let spanRam = document.createElement('span');
        spanRam.textContent = element.ram;
        spanRam.classList.add('info-left');
        pRam.appendChild(spanRam);

        let pSar = document.createElement('p');
        pSar.textContent = "SAR: ";
        card.appendChild(pSar);

        let spanSar = document.createElement('span');
        spanSar.textContent = element.sar;
        spanSar.classList.add('info-left');
        pSar.appendChild(spanSar);

        let price = document.createElement('p');
        price.textContent = "Price: ";
        card.appendChild(price);

        let spanPrice = document.createElement('span');
        spanPrice.textContent = element.price;
        spanPrice.classList.add('info-left');
        price.appendChild(spanPrice);



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
