## Objetivo geral:
* Desenvolver um sistema web para uma imobiliária usando as linguagens:

    * PHP estruturado e O.O;
    * HTML 5;
    * CSS;
    * JQuery;
    * Javascript;
    * SQL (CRUD).

* Funcionalidades do site:

    * Criação do logotipo é de responsabilidade de cada equipe;
    * Layout deve ser clean, com navegabilidade e usabilidade profissional;
    * Aplicação de responsividade;
    * Tela de login com recurso de Esqueci minha Senha e com 3 perfis de acesso: usuário
    (Administrador, Corretor e Cliente);
    * Senha com mínimo 7 e máximo 10 caracteres alfanuméricos;
    * Aplicação de certificado de segurança. Escolher um certificado gratuito;
    * Aplicação de criptografia;
    * Uso de ícones profissionais relacionados a cada funcionalidade;
    * A paginação deve ser limitada a 12 fotos por página;
    * Mostrar os imóveis por região mostrando os preços dos imóveis no formato de pin no mapa,
    para facilitar ao usuário clicar nos imóveis e verificar os preços que estão dentro do seu
    orçamento;
    * Nas operações relacionadas aos imóveis para venda e locação (cadastro, atualização e deleção
    de dados), é obrigatória a mensagem de confirmação antes da efetivação da operação;
    * Recurso de recuperação de dados durante o preenchimento nos forms;
    * As informações devem ser autênticas e de cunho fictício. PROIBIDO INSERIR: nomes como
    teste, telefone: 12345678, cidades não associadas à respectiva unidade federativa, etc..;
    * Obrigatória organização de pastas na estruturação do projeto;
    * O sistema web deve estar hospedado no hostinger (hospedagem gratuita) com domínio
    relacionado a imoveisbeta.
        
## Arquitetura do sistema:

#### Estrutura básica de um Bounded Context do sistema:

Podem ser sistemas totalmente distintos mas no nosso caso serão a separação de contextos na mesma aplicação, isso facilitará a migração para outros modelos como SOA e Microsserviços quando houver necessidade. Segue Definição, para mais referências sobre assunto ler livros de DDD do Eric Evans e Vaughn Vernon: https://martinfowler.com/bliki/BoundedContext.html*

```
├── App
    │   ├── Application
    │   │   ├── Command
    │   │   │   └── Email.php
    │   │   └── Handler
    │   │       └── EmailCommandHandler.php
    │   ├── Domain
    │   │   ├── Entity
    │   │   │   └── Email.php
    │   │   ├── Event
    │   │   │   └── EmailSent.php
    │   │   ├── Repository
    │   │   │   └── EmailRepositoryInterface.php
    │   │   └── Exception
    │   │       └── EmailDomainException.php
    │   │ 
    │   └── Infrastructure
    │       ├── Persistence
    │       │   ├── Doctrine
    │       │   │   ├── ORM
    │       │   │   │   └── App.Domain.Entity.Repurchase.dcm.yml 
    │       │   │   ├── Repository  
    │       │   │   │   └── DoctrineEmailRepository.php
    │       │   │   │       
    │       │   │   │ 
```

- **App > Application > Command** - Ficam os Use Cases ou em outras palavras, mensagens que determinam uma intenção de um usuário, bot, fila, ou terminal. Devem ser capturados nas reuniões com a equipe de negócio.
- **App > Application > Handler** - Ficam os *Command handlers* trabalham como uma camada de serviço no padrão MVCS, podem tanto tratar um command quanto vários do mesmo contexto.
- **App > Domain > Entity** - Model - Agregates (Entidades Raiz, geralmente os UseCases dizem respeito a ela) e entities e Value Object.
- **App > Domain > Event** - Todos os eventos que ocorrem nesse contexto, são produzidos pelas Agregados ou Entidades.
- **App > Domain > Repository** - Interfaces que representam como devem ser os Repositories desse contexto, a camada de infraestrutura implementa eles para fornecedor a classe concreta faz as requisições para serviços de apoio tais como: Banco de Dados, APIs.
- **App > Infrastruture** - É um módulo de algum framework, nesse caso ZF3, nessa camada não há necessidade de ter controllers ou views, somente as implementações de Repositories, Comunicação com serviços externos, apis de terceiros, sistemas de mensageria, etc.

#### Práticas e Frameworks

 - 12FactorApp - https://12factor.net/pt_br/
 - Zend Expressive 3
 - DDD - Domain Driven Design
   * Referências:
     * Eric Evans https://domainlanguage.com/
     * Vaughn Vernon https://vaughnvernon.co/
     * Martin Fowler https://martinfowler.com/
    
 - BDD e TDD - Behavior Driven Development e Test Driven Development
    * Behat
    * PhpUnit    
    
 - SOLID
 - PSR2
 - Object Calisthenics
 - Design Patterns
 - Zend Framework 3 para camada de Infraestrutura e Apresentação
 
 
#### Padrões Arquiteturais

 - Hexagonal Arquitecture
   * Também conhecida como Ports/Adapters ou Onion Arquicteture. É uma padrão de arquitetura que consiste em isolar as camadas de níveis mais baixas das camadas de níveis mais altas.
    O Core deve ser totalmente agnóstico de framework, apresentação ou serviços de infraestrutura como Banco de Dadosm, Serviços de Mensageria, etc...
   * A Camada de Domínio deve trabalhar apenas objetos em memória, ela tem a responsabilidade de definir as entidades que deverão ser implementadas na camada de infraestrutura.
   
 - CQRS - https://martinfowler.com/bliki/CQRS.html, http://www.eduardopires.net.br/2016/07/cqrs-o-que-e-onde-aplicar/, http://cqrs.nu/
    * Toda aplicação segue um fluxo para alteração de estado e outro para leitura
    * Dentro da pasta Application deve conter a pasta Command e a pasta Handler
      * Commands devem mostrar a intenção do usuário (Web, Cli, API, Mensageria)
      * CommandHandlers são a nossa camada de serviço, ela possui métodos para receber os commandos no seguinte padrão: 
        ```php 
        // Para facilitar o desenvolvimento, vamos utilizar uma solução open-source para auxiliar a implementação de padrão
        // A princípio foi escolhida a biblioteca Broadway https://github.com/broadway. Ela possui tanto recursos para CQRS quanto para EventSource
        // Sendo assim o métodos para executar os commands seguem a seguinte convenção:   
            
            class TrackingCommandHandler  
            {
                public function handleTrackingCommand(TrackingCommand $command) ...
            }
        ```
        
 - Domain Event
   * Cada entidade deve ser responsável por lançar eventos de alterações relevantes de estado na aplicação
   
Tirando isso você pode desenvolver da forma que preferir :)

#### Contribuidores

- Ricardo Marangoni da Mota
- Ronie Neubauer
