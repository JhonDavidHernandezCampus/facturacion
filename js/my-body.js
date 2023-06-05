
import styles from "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" assert { type: "css" };
export class myBody extends HTMLElement{
    constructor(){
        super();
        document.adoptedStyleSheets.push(styles);
    }
    async components(){
        return await (await fetch("view/my-body.html")).text();
    }

    async add(e){
        console.log(e);


    }
    connectedCallback(){
        this.components().then(html =>{
            this.innerHTML = html;
            this.add = this.querySelector("#btnadd").addEventListener("click", this.add);
        })
    }
}

customElements.define("my-body" , myBody);

/*
esta es la logica del profesor para que se guie
/**
 * todo: Miguel del futuro arregle esto ▼ 
 * ? Esta una Mier.....da :)
 * @var styles

import styles from "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" assert { type: "css" };
export class myBody extends HTMLElement {
    constructor() {
        super();
        this.count = 1;
        document.adoptedStyleSheets.push(styles);
    }
    async components() {
        return await (await fetch("view/my-body.html")).text();
    }
    async add(){
        let plantilla = await (await fetch("view/my-productDetails.html")).text();
        let render = new DOMParser().parseFromString(plantilla, "text/html")["body"];
        render.children[0].id="product_"+this.count;
        let buttons = render.querySelectorAll("button");
        buttons.forEach(element => {
            element.dataset.row = "product_"+this.count;
        });
        document.querySelector("#products").insertAdjacentElement("beforeend", render.children[0]);
        this.count++;
    }
    connectedCallback() {
        this.components().then(html => {
            this.innerHTML = html;
            this.add = this.querySelector("#add").addEventListener("click", this.add.bind(this));
         
        })
    }
}
customElements.define('my-body', myBody);



*/