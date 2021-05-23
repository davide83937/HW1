
        

function carrelloResponse(response){
    return response.json()
}

function carrelloJson(json){

    const carrello = document.querySelector('#carrello')
    console.log('funziono')
//PRODOTTO

for(let i=0; i<json.length-1; i++){


const prodotto = document.createElement('div')
      prodotto.classList.add('pro')
      const img = document.createElement('img')
      img.src = json[i].Immagine
    //DETTAGLI
    const dettagli = document.createElement('div')
    dettagli.classList.add('dettagli')
         const nome = document.createElement('p')
         nome.classList.add('n')
         nome.textContent =  json[i].Nome
         const nome_modello = document.createElement('p')
         nome_modello.classList.add('nModello')
         nome_modello.textContent = json[i].Nome_Modello
         const disp = document.createElement('p')
         let o = json[i].Quantita_Componente - json[i].Quantita_Venduta
         disp.textContent = 'Disponibilita: '+ o 
         disp.classList.add('n_disp')
         dettagli.appendChild(nome)
         dettagli.appendChild(nome_modello)
         dettagli.appendChild(disp)
         
         //QUANTITA
         const quant = document.createElement('div')
         quant.classList.add('quant')
              const meno = document.createElement('button')
              meno.classList.add('meno')
              meno.textContent = '-'
              const n_acqu = document.createElement('p')
              n_acqu.classList.add('n_acqu')
              n_acqu.textContent = json[i].Numero
              const piu = document.createElement('button')
              piu.classList.add('piu')
              piu.textContent = '+'
              const img2 = document.createElement('img')
              img2.classList.add('hidden')
              img2.src = 'x.jpg'
              quant.appendChild(meno)
              quant.appendChild(n_acqu)
              quant.appendChild(piu)
              quant.appendChild(img2)
              dettagli.appendChild(quant)

    //PREZZO 
    const prezzo = document.createElement('div')
    prezzo.classList.add('prezzo')
         const pre = document.createElement('p')
         pre.textContent = json[i].Prezzo+' €'
         const cest = document.createElement('button')
         cest.classList.add('cest')
         prezzo.appendChild(pre)
         prezzo.appendChild(cest)

         prodotto.appendChild(img)
         prodotto.appendChild(dettagli)
      
         prodotto.appendChild(prezzo)

         carrello.appendChild(prodotto)

         let sottrai = document.querySelectorAll('.meno')
         for(s of sottrai){
            s.addEventListener('click', sottrazione)
         }

         let somma = document.querySelectorAll('.piu')
         for(p of somma){
             p.addEventListener('click', addizione)
         }

         let elimina = document.querySelectorAll('.cest')
         for(c of elimina){
             c.addEventListener('click', eliminazione)
         }

    }
}

let prezzo = document.querySelector('#acquisto p');

fetch('aggiorna_prezzo.php').then(prezzoResponse).then(prezzoText);

function prezzoResponse(response){
    
    return response.text()
}

function prezzoText(text){
    prezzo.textContent = text + ' €';
}


let tasto_elimina = 0;

function eliminazione(event){
    tasto_elimina = event.currentTarget
    const nome = tasto_elimina.parentNode.previousSibling.firstChild
    const nomeModello = nome.nextSibling
    const codice = '1234'
    fetch('sottrai_carrello.php?nome='+encodeURIComponent(nome.textContent)+'&nomeModello='+encodeURIComponent(nomeModello.textContent)+'&codice='+encodeURIComponent(codice)).then(eliminaResponse).then(eliminaText)
}

function eliminaResponse(response){
    return response.text()
}

function eliminaText(text){
    console.log(text)
    if(text == 2){
        const comp = tasto_elimina.parentNode.parentNode
        comp.remove()
    }
    fetch('aggiorna_prezzo.php').then(prezzoResponse).then(prezzoText);
}

fetch('carica_carrello.php').then(carrelloResponse).then(carrelloJson) 

let tastoPiu = 0;

function aggcarResponse(response){
    console.log('Rispondo')
    return response.text()
}

function aggcarText(text){
    console.log(text)
    if(text == 1){
    tastoPiu.nextSibling.classList.remove('hidden')
    } else{
        tastoPiu.nextSibling.classList.add('hidden')
        let t = tastoPiu.parentNode.firstChild.nextSibling
        n = t.textContent
        t.textContent = parseInt(n) + 1;
    }
    fetch('aggiorna_prezzo.php').then(prezzoResponse).then(prezzoText);
}

function addizione(event){
    console.log('Addiziono')
     tastoPiu = event.currentTarget
     const nom = tastoPiu.parentNode.parentNode.firstChild
     const nomModello = nom.nextSibling
    fetch('aggiungi_carrello.php?nome='+encodeURIComponent(nom.textContent)+'&nomeModello='+encodeURIComponent(nomModello.textContent)).then(aggcarResponse).then(aggcarText)
}


let tastoMeno = 0;

function sottraiResponse(response){
     return response.text()
}

function sottraiText(text){
     let elemento = 0;
     if(text == 0){
        elemento = tastoMeno.parentNode.parentNode.parentNode.remove()
     }else{
        elemento = tastoMeno.nextSibling
        n = elemento.textContent
        elemento.textContent = n - 1;
     }
     fetch('aggiorna_prezzo.php').then(prezzoResponse).then(prezzoText);

}

function sottrazione(event){
     tastoMeno = event.currentTarget
     const nom = tastoMeno.parentNode.parentNode.firstChild
     const nomModello = nom.nextSibling
     fetch('sottrai_carrello.php?nome='+encodeURIComponent(nom.textContent)+'&nomeModello='+encodeURIComponent(nomModello.textContent)).then(sottraiResponse).then(sottraiText)
}

function sessionResponse(response){
     return response.text()
}

function sessionText(text){

     if(text == 0){
          console.log(text)
     }else{
          const user = document.querySelector('#carrello p')
          user.textContent = text
     }
}

fetch('sessionCheck.php').then(sessionResponse).then(sessionText)

const acquista = document.querySelector('#acquisto button');

acquista.addEventListener('click', acquistalo)

function acquistaResponse(response){
   return response.text()
}



function ok(event){
    const io = event.currentTarget.parentNode.parentNode
    io.classList.add('hidden2')
    document.body.classList.remove('no-scroll');
}

function acquistaText(text){
    if(text == 0){
       const modal = document.querySelector('#modal')
       const div = document.createElement('div')
       div.classList.add('acquisto_ok')
       const h1 = document.createElement('h1')
       const but = document.createElement('button')
       h1.textContent = 'Acquisto effettuato con successo'
       but.textContent = 'Ok'
       div.appendChild(h1)
       div.appendChild(but)
       modal.appendChild(div)
       but.addEventListener('click', ok)
       modal.classList.remove('hidden2')
       document.body.classList.add('no-scroll');
       modal.style.top = window.pageYOffset + 'px'

    }
}

function acquistalo(event){
   fetch('acquista.php').then(acquistaResponse).then(acquistaText)
}