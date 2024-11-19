const form = document.getElementById('formCadastroChamado');
const mensagem = document.getElementById('mensagem');

form.addEventListener('submit', (event) => {
    event.preventDefault();

    const descricao = document.getElementById('descricao').value;
    const criticidade = document.getElementById('criticidade').value;
    const colaborador = document.getElementById('colaborador').value;

    const dataAbertura = new Date().toISOString().slice(0, 10);

    fetch('chamado.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `descricao=${descricao}&criticidade=${criticidade}&colaborador=${colaborador}&dataAbertura=${dataAbertura}`
    })
    .then(response => response.json())
    .then(data => {
        mensagem.textContent = data.mensagem;
    })
    .catch(error => {
        console.error('Erro ao enviar os dados:', error);
        mensagem.textContent = 'Ocorreu um erro ao cadastrar o chamado.';
    });
});