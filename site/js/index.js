function logar(event){
    //impede o envio normal do formulário
    //força a chamada a passar pelo "modal"
    event.preventDefault();

    var nome = document.getElementById('nome').value;
    var marca = document.getElementById('marca').value;
    var preco = document.getElementById('preco').value;
    var descricao = document.getElementById('descricao').value;

    if(nome=="" && marca=="" && preco==""&& descricao==""){
        Swal.fire({
            title: 'Preencha todos os campos',
             
            icon: 'error',
            confirmButtonText: 'Tentar novamente!'
        }).then(() => {
            setTimeout(() => {
                location.href="./html/home.html";
            }, 100);
        });

        //alert('LOGIN OK');
        //location.href = './html/home.html';
    }else{
        Swal.fire({
            title:'Erro!',
            text: 'Usuário ou senha incorretos.',
            icon: 'success',
            confirmButtonText: 'Tentar novamente'
        })
        //alert('ERRO usuário ou senha incorretos');
    }

}