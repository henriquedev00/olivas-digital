document.querySelectorAll(".modal-open").forEach((function(e){e.addEventListener("click",(function(){return e="modal-telefone",t=document.getElementById(e),void(e&&(t.classList.add("active"),t.addEventListener("click",(function(c){c.target.id!==e&&"close"!==c.target.className||t.classList.remove("active")}))));var e,t}))}));