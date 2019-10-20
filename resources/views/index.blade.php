<html>
    <head>
        <meta charset="utf-8">
        <style>
            @font-face {
                font-family: 'GelPenUprightLight';
                src: url('./fonts/GelPenUprightLight.ttf'); 
            }     
            * {
                font-family: 'GelPenUprightLight', Arial;
                margin: 0px;
                padding: 0px;
                box-sizing: border-box;
            }
            body {                
                background-image: url("./img/others/background.jpg");
                background-size: cover;
            }
            header {
                padding: 20px;
            }
            .container {
                padding: 20px 0 20px 0;
                max-width: 800px;
                margin: 0 auto;
            }
            .card {
                width: 100%;                
                border: 6px solid #ba8a53;
                border-radius: 15px;
                color: #d3bdad;
                background: rgba(63, 63, 63, 0.3);
                -webkit-box-shadow: 0px 0px 89px -19px rgba(0,0,0,0.75);
                -moz-box-shadow: 0px 0px 89px -19px rgba(0,0,0,0.75);
                box-shadow: 0px 0px 89px -19px rgba(0,0,0,0.75);                
            }
            .card strong {
                font-size: 1.6em;
            }
            .card  p {
                font-size: 1.2em;
            }            
            .lary {
                display: flex;
            }
            .lary > div {
                padding: 10px;
            }            
            .lary img {
                width: 120px;
                height: 120px;
                border-radius: 15px;
                border: 6px solid #ba8a53;
                -webkit-box-shadow: 0px 0px 89px -19px rgba(0,0,0,0.75);
                -moz-box-shadow: 0px 0px 89px -19px rgba(0,0,0,0.75);
                box-shadow: 0px 0px 89px -19px rgba(0,0,0,0.75);                     
            }     
            main > div {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }                   
            .add {
                height: 236px;
            }
            .add > button { 
                display: grid;
                width: 100%;
                height: 100%;                
                justify-items: center;
                align-items: center;                  
                background: none;
                border: 0;
                color: #d3bdad;
                display: block;
                cursor: pointer;
            }
            .add > button:hover  { 
                background: #ba8a5385;
            }
            .add i {
                font-size: 5em;
            }      
            .add h2 {
                padding-top: 20px;
                font-size: 2em;
            }                    
            .hero {
                padding: 10px;
            }
            .hero input {
                width: 100%;
                border: 0;
                border-bottom: 1px solid #fff0;
                background: none;
                color: #d3bdad;
                font-family: inherit; 
            }     
            .hero input {
                pointer-events: none;
            }   
            .hero input:focus{
                outline: none;
            }                                          
            .hero.active input {
                border-bottom: 1px solid #d3bdad23;
                pointer-events: auto;
            }                                 
            .hero .header {
                display: grid;
                grid-template-columns: 1fr 80px;            
            }                 
            .hero .header > div:nth-child(2) {
		        grid-row: span 2;
                text-align: center;
            }     
            .hero .header img {
                height: 100%;
                cursor: pointer;
            }
            .hero .header input::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
                color: #d3bdad4d;
            }
            .hero .header [name=nome] {
                font-size: 1.6em;
            }
            .hero input[type='file'] {
                display: none;
            }                                                    
            .hero .data {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
		        grid-template-rows:  repeat(4, 1fr);     
                padding-top: 10px;           
            }  
            .hero .data > div {
                display: flex;
                white-space: nowrap;
            }   
            .hero .data > div {
                font-weight: bold;
            }
            .hero .data i {
                font-size: .8em;
                margin-right: 6px;
                transform: rotate(45deg);
            }                           
            .hero .data > div:nth-child(1) {
                grid-column: col / span 3;
		        grid-row: row 1;
            }     
            .hero .data > div:nth-child(2) {
                grid-column: col;
		        grid-row: row 2;
            }     
            .hero .data > div:nth-child(3) {
                grid-column: col 2;
		        grid-row: row 2;
            }    
            .hero .data > div:nth-child(4) {
                grid-column: col 3 ;
		        grid-row: row 2;
            }                                                   
            .hero .data > div:nth-child(5) {
                grid-column: col / span 3;
		        grid-row: row 3;
            }                  
            .hero .data > div:nth-child(6) {
                grid-column: col / span 3;
		        grid-row: row 4;
            }                             
            .hero .data input {
                margin: 0 4px 0 8px;
                height: 22px;                
                font-size: .9em;
            }   
            .hero > .actions {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;         
                padding-top: 10px;
            }
            .hero > .actions > button {                
                width: 100%;
                height: 40px;
                font-size: 1.4em;
                background: #ba8a5385;
                border: 0;
                border-radius: 10px;
                color: #d3bdad;
                cursor: pointer;
            }     
            .hero > .actions > button:hover {
                background: #ba8a53da;
            }
            @media (max-width: 720px) 
            {
                .container {
                    padding: 20px 20px 0 20px;

                }                
                main > div {
                    grid-template-columns: 1fr;
                }
            }
        </style>
        <script src="https://kit.fontawesome.com/23b7f2f41b.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header class="container">
            <div class="card lary">
                <div>
                    <img src="./img/heroes/lary.jpg">
                </div>
                <div>
                    <strong>Olá, meu nome é Lary!</strong>
                    <p>
                        Agora você tem a missão de adicionar, editar e excluir os heróis do nosso clã!
                    </p>                
                    <p>
                        Organize nossa raid com cuidado, estou de olho!
                    </p>                                    
                </div>                
            </div> 
        </header>       

        <main class="container">          
        </main>  

        <script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
        <script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>                   
        <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script type="text/babel">
            // Main
            const Main = (props) => {
                // Guarda lista com os herois
                const [heroes, setHeroes] = React.useState([]);

                // Ao abrir atualiza herois
                React.useEffect(() => {
                    refreshHeroes();                                        
                },[]);                

                // Atualiza os cards de herois
                async function refreshHeroes() {
                    setShowAddForm(false);
                    const heroes = await axios.get('/api/heroes');
                    setHeroes(heroes.data);
                };

                // Exibe botão adicionar ou o card novo
                const [showAddForm,setShowAddForm] = React.useState(false);
                const handleAdd = () => {
                    setShowAddForm(true);
                }                

                // Retorna o componente
                return (
                    <div>    
                        { showAddForm 
                            ? (
                                <HeroForm id={`card-add`} cardState='add' refreshHeroes={refreshHeroes} />                                        
                            )                            
                            : (
                                <AddCard refreshHeroes={refreshHeroes} handleAdd={handleAdd} />
                            )
                        }                        
                        {heroes.map((hero) => (
                            <HeroForm key={hero.id} id={`card-${hero.id}`} json={hero} refreshHeroes={refreshHeroes} />
                        ))}
                    </div>
                )
            }            

            // Adicionar 
            const AddCard = (props) => {
                return (
                    <div className="card add">
                        <button onClick={props.handleAdd}>
                            <div>
                                <i className="fas fa-plus"></i>
                                <h2>Adicionar</h2>                    
                            </div>                    
                        </button>
                    </div>                        
                )
            }    
            
            // Dados do heroi
            const HeroForm = (props) => {
                // Estado do form, vazio = default, edit = edição
                const [cardState, setCardState] = React.useState(props.cardState || '');
                
                // Pega dados do json
                const { id = '', thumbnail = '', nome , tipo, especialidade, vida, defesa, dano, velocidade_ataque, velocidade_movimento } = props.json || {};
                
                // Ação do botão editar
                const handleEdit = () => {           
                    setCardState('edit');
                }

                // Ação do botão fechar
                const handleClose = () => {           
                    props.refreshHeroes();
                }                

                // Ação do botão delete
                const handleDelete = async () => {   
                    // Pergunta antes de excluir
                    if (confirm(`Deseja excluir ${nome} o ${tipo}?`)) {
                        // Tenta excluir
                        const response = await axios.delete(`/api/heroes/${id}`);
                        // Verifica se houve erros
                        if (response.data.status == 'error') {
                            alert(response.data.message);
                            return;
                        }
                        // Atualiza guerreiros
                        props.refreshHeroes();
                    }
                }                

                // Ação do botão Salvar
                const handleSave = async () => {                         
                    // Pega form
                    let formData = new FormData(document.querySelector(`#${props.id} > form`))
                                
                    // Envia para o laravel
                    const response = await axios({
                        method: 'post',
                        url: `/api/heroes/${id}`,
                        data: formData,
                        config: { headers: {'Content-Type': 'multipart/form-data' }}
                    });

                    // Verifica se houve erros
                    if (response.data.status == 'error') {
                        alert(response.data.message);
                        return;
                    } else if (response.data.status == 'warning') {
                        alert(response.data.message);
                    }

                    // Volta para o stado padrão do card
                    setCardState('');
                    // Atualiza lista
                    props.refreshHeroes();
                }  
                
                // Ação do click na imagem
                const handleClickImg = () => {   
                    // Se o estado do card não for adição ou edição
                    if (cardState == '')              
                        return;
                    // Simula click no input da thumbnail
                    document.querySelector(`#${props.id} [name=thumbnail]`).click();
                }    
                
                // Ao selecionar arquivo, exibe preview da imagem
                const handleChangeImg = (e) => {   
                    // Input de upload
                    let thumbnailSelector = document.querySelector(`#${props.id} [name=thumbnail]`);
                    // Se existir arquivos
                    if (thumbnailSelector.files && thumbnailSelector.files[0]) {
                        // Troca a imagem
                        var reader = new FileReader();                       
                        reader.onload = (e) => {
                            let img = document.querySelector(`#${props.id} img`);
                            img.src = e.target.result;
                        }                        
                        reader.readAsDataURL(thumbnailSelector.files[0]);
                    }                    
                }                   

                return (
                    <div id={props.id} className={"card hero " + (cardState == 'add' || cardState == 'edit'  ? 'active' : '')}>  
                        <form>
                            <input type="hidden" name="_token" defaultValue="{{ csrf_token() }}" /> 
                            <input type="file" name="thumbnail" accept="image/*" onChange={handleChangeImg} />
                            <div className="header">
                                <div><input type="text" name="nome" placeholder="Nome" defaultValue={nome} /></div>
                                <div>
                                    {   thumbnail != null || cardState == 'add' || cardState == 'edit'
                                        ? (
                                            <img src={thumbnail || '' != '' ? `./img/heroes/${thumbnail}` : './img/others/upload.png'} alt="" onClick={handleClickImg} />
                                        )
                                        : (<span />)
                                    }                                    
                                </div>
                                <div><input type="text" name="tipo" placeholder="Tipo" defaultValue={tipo} /></div>                    
                            </div>
                            <div className="data">
                                <div><span><i className="fas fa-square"> </i>Especialidade:</span><input type="text" name="especialidade" defaultValue={especialidade} /></div>                   
                                <div><span><i className="fas fa-square"> </i>Vida:</span><input type="text" name="vida" defaultValue={vida} /></div>
                                <div><span><i className="fas fa-square"> </i>Defesa:</span><input type="text" name="defesa" defaultValue={defesa} /></div>
                                <div><span><i className="fas fa-square"> </i>Dano:</span><input type="text" name="dano" defaultValue={dano} /></div>
                                <div><span><i className="fas fa-square"> </i>Velocidade de ataque:</span><input type="text" name="velocidade_ataque" defaultValue={velocidade_ataque} /></div>
                                <div><span><i className="fas fa-square"> </i>Velocidade de movimento:</span><input type="text" name="velocidade_movimento" defaultValue={velocidade_movimento} /></div>
                            </div>
                        </form>
                        { cardState == 'add' || cardState == 'edit'
                            ? (
                                <div className="actions">
                                    <button className="btn-save" onClick={handleSave}><i className="fas fa-check"></i></button>
                                    { cardState == 'add' 
                                        ? (
                                            <button className="btn-add" onClick={handleClose}><i className="fas fa-times"></i></button>
                                        )
                                        : (<span />)                                       
                                    }
                                </div>
                            )                                
                            :(
                                <div className="actions">
                                    <button className="btn-edit" onClick={handleEdit}><i className="fas fa-edit"></i></button>
                                    <button className="btn-delete" onClick={handleDelete}><i className="fas fa-trash-alt"></i></button>                   
                                </div>
                            )             
                        }
                    </div>   
                )                
            }
            
            // Renderiza
            ReactDOM.render(        
                <Main />
            ,document.querySelector('main'));
        </script>          
    </body>
</html>