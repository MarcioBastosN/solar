<?php

namespace App\Http\Livewire;

use App\Mail\EmailController;
use App\Models\DataSheetInversor;
use App\Models\DataSheetModulo;
use App\Models\Dijuntor;
use App\Models\FaturaBeneficiaria;
use App\Models\faturas_uc;
use App\Models\Procuracao;
use App\Models\Register;
use App\Models\RG_CNH;
use App\Models\StatusProjet;
use App\Models\UserRequest;
use App\Models\ValidaDocumento;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class HomeUser extends Component
{
    use Actions, WithFileUploads;

    public $exibir_empresa = false;

    public $nome, $identificacao_pf_pj,  $corrente_disjuntor;
    public $kwp, $fotovoltaico, $inversor, $dijuntor_id, $telefone, $observacao;

    //arquivos
    public $datasheet_inversor, $datasheet_modulo,
        $fatura_beneficiaria, $cnh_socio, $procuracao,
        $fatura_da_uc, $padrao_de_entrada;

    public $tipo_pessoa = 'pf';

    // limite arquivos 10MB
    protected $rules = [
        'identificacao_pf_pj' => 'required|max:10240',
        'procuracao' => 'required|max:10240',
        'fatura_da_uc' => 'required|max:10240',
        'telefone' => "required|min:10",
        'nome' => "required|min:3",
        'kwp' => "required",
        'fotovoltaico' => "required",
        'inversor' => "required",
        'datasheet_inversor' => "required|max:10240",
        'datasheet_modulo' => "required|max:10240",
        'fatura_beneficiaria' => "required|max:10240",
        'cnh_socio' => "max:10240",
        'corrente_disjuntor' => "required",
    ];
    // 'padrao_de_entrada' => 'required|max:10240',
    // 'dijuntor_id' => "required",

    protected $messages = [
        'identificacao_pf_pj.max' => 'Arquivo é maior que 10 mb',
        'procuracao.max' => 'Arquivo é maior que 10 mb',
        'fatura_da_uc.max' => 'Arquivo é maior que 10 mb',
        'telefone.min' => 'Telefone deve ter no minimo 11 digitos',
        'nome.min' => 'O nome deve possuir no minimo 3(tres) letras',
        'datasheet_inversor.max' => 'Arquivo é maior que 10 mb',
        'datasheet_modulo.max' => 'Arquivo é maior que 10 mb',
        'cnh_socio.max' => 'Arquivo é maior que 10 mb',
        'fatura_beneficiaria.max' => 'Arquivo é maior que 10 mb',

        'identificacao_pf_pj.required' => 'Arquivo é Obrigatório',
        'procuracao.required' => 'Arquivo é Obrigatório',
        'fatura_da_uc.required' => 'Arquivo é Obrigatório',
        'telefone.required' => 'Necessario informar o telefone',
        'nome.required' => 'Necessario informar o nome',
        'kwp.required' => 'Arquivo é Obrigatório',
        'fotovoltaico.required' => 'Arquivo é Obrigatório',
        'inversor.required' => 'Arquivo é Obrigatório',

        'datasheet_inversor.required' => 'Arquivo é Obrigatório',
        'datasheet_modulo.required' => 'Arquivo é Obrigatório',
        'fatura_beneficiaria.required' => 'Arquivo é Obrigatório',

        'corrente_disjuntor.required' => 'Campo Obrigatório',

    ];
    // 'padrao_de_entrada.max' => 'Arquivo é maior que 10 mb',
    // 'padrao_de_entrada.required' => 'Arquivo é Obrigatório',
    // 'dijuntor_id.required' => 'Campo Obrigatório',

    public function trocaStatus()
    {
        $this->exibir_empresa = !$this->exibir_empresa;
        if ($this->exibir_empresa) {
            $this->tipo_pessoa = 'pj';
        } else {
            $this->tipo_pessoa = 'pf';
        }
    }

    public function redireciona()
    {
        return redirect()->route('cliente.porjects');
    }

    public function updated($fatura_da_uc)
    {
        $this->validateOnly($fatura_da_uc);
    }

    public function dijuntor($id)
    {
        $this->dijuntor_id = $id;
    }

    public function save()
    {
        $caminho = "documentos/" . auth()->user()->id;
        $this->validate();

        DB::beginTransaction();
        try {

            $user_id = auth()->user()->id;

            $register = Register::create([
                'user_id' => $user_id,
                'nome' => $this->nome,
                'telefone' => $this->telefone,
                'tipo_pessoa' => $this->tipo_pessoa,
                'corrente_disjuntor' => $this->corrente_disjuntor,
                'observacao' => $this->observacao,
                'kwp' => $this->kwp,
                'fotovoltaico' => $this->fotovoltaico,
                'inversor' => $this->inversor,
                'dijuntor_id' => $this->dijuntor_id,
            ]);

            $status_do_projeto = StatusProjet::find(1);

            $requestUser = UserRequest::create([
                'customer_id' => $user_id,
                'register_id' => $register->id,
                'status_id' => $status_do_projeto->id,
            ]);

            $documentos = ['identificacao_pf_pj', 'procuracao', 'datasheet_inversor', 'datasheet_modulo', 'fatura_da_uc', 'fatura_beneficiaria'];

            foreach ($documentos as $doc) {
                DB::transaction(fn () => ValidaDocumento::create([
                    'register_id' => $register->id,
                    'documento' => $doc,
                    'status_id' => 1,
                ]));
            }
            // faturas uc
            foreach ($this->fatura_da_uc as $fatura) {
                $fatura_path = $fatura->store($caminho);
                DB::transaction(fn () => faturas_uc::create([
                    'register_id' => $register->id,
                    'path' => $fatura_path,
                ]));
            }
            // procuracao
            foreach ($this->procuracao as $item) {
                $path = $item->store($caminho);
                DB::transaction(fn () => Procuracao::create([
                    'register_id' => $register->id,
                    'path' => $path,
                ]));
            }
            // identificacao_pf_pj
            foreach ($this->identificacao_pf_pj as $item) {
                $path = $item->store($caminho);
                DB::transaction(fn () => RG_CNH::create([
                    'register_id' => $register->id,
                    'path' => $path,
                ]));
            }
            // datasheet_inversor
            foreach ($this->datasheet_inversor as $item) {
                $path = $item->store($caminho);
                DB::transaction(fn () => DataSheetInversor::create([
                    'register_id' => $register->id,
                    'path' => $path,
                ]));
            }
            // datasheet_modulo
            foreach ($this->datasheet_modulo as $item) {
                $path = $item->store($caminho);
                DB::transaction(fn () => DataSheetModulo::create([
                    'register_id' => $register->id,
                    'path' => $path,
                ]));
            }
            // fatura_beneficiaria
            foreach ($this->fatura_beneficiaria as $item) {
                $path = $item->store($caminho);
                DB::transaction(fn () => FaturaBeneficiaria::create([
                    'register_id' => $register->id,
                    'path' => $path,
                ]));
            }
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
        DB::commit();

        try {
            Mail::to("marciobatosn@gmail.com", "Solar-Project")->send(new EmailController([
                'fromName' => auth()->user()->name,
                'fromEmail' => auth()->user()->email,
                'subject' => "Um novo projeto foi iniciado!",
                'message' => "O usuario: " . auth()->user()->name . ", se registrou para um novo projeto.",
            ]));

            Mail::to(auth()->user()->email, "Solar-Project")->send(new EmailController([
                'fromName' => "Solar-Project",
                'fromEmail' => "marciobastosn@gmail.com",
                'subject' => "Projeto registrado!",
                'message' => "Aguarde, logo o responsavel iniciara seu projeto",
            ]));
        } catch (Exception $e) {
            $this->notification()->error(
                $title = "Error",
                $description = "Não foi possivel enviar o E-mail"
            );
        }

        $this->dialog()->confirm([
            'title'       => 'Cadastro Realizado',
            'description' => 'informações salvas',
            'icon'        => 'success',
            'accept'      => [
                'label'  => 'Ir para Meus Projetos',
                'method' => 'redireciona',
                'params' => '',
            ],
        ]);
    }

    public function render()
    {
        $dijuntores = Dijuntor::all();
        return view('livewire.home-user')->with(compact('dijuntores'));
    }
}
