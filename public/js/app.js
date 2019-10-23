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
            url: `/api/heroes${id != '' ? '/' : ''}${id}`,
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
                    <div><span><i className="fas fa-square"> </i>Vida:</span><input type="number" name="vida" min="0" max="10000" defaultValue={vida} /></div>
                    <div><span><i className="fas fa-square"> </i>Defesa:</span><input type="number" name="defesa" min="0" max="10000" defaultValue={defesa} /></div>
                    <div><span><i className="fas fa-square"> </i>Dano:</span><input type="number" name="dano" min="0" max="10000" defaultValue={dano} /></div>
                    <div><span><i className="fas fa-square"> </i>Velocidade de ataque:</span><input type="number" name="velocidade_ataque" min="0" max="10000" defaultValue={velocidade_ataque} /></div>
                    <div><span><i className="fas fa-square"> </i>Velocidade de movimento:</span><input type="number" step="0.01" min="0" max="10000" name="velocidade_movimento" defaultValue={velocidade_movimento} /></div>
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