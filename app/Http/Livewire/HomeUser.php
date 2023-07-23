<?php

namespace App\Http\Livewire;

use App\Models\Dijuntor;
use App\Models\Register;
use App\Models\StatusProjet;
use App\Models\UserRequest;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class HomeUser extends Component
{
    use Actions;
    use WithFileUploads;
    //controller exibir campos da view
    public $exibir_empresa = false;
    // arquivos
    public $identificacao_pf_pj,  $procuracao, $fatura_da_uc, $padrao_de_entrada, $datasheet;
    public $kwp, $fotovoltaico, $inversor, $dijuntor_id, $telefone, $observacao;
    //
    public $tipo_pessoa = 'pf';

    protected $rules = [
        'identificacao_pf_pj' => 'required|max:1024',
        'procuracao' => 'required|max:1024',
        'fatura_da_uc' => 'required|max:1024',
        'padrao_de_entrada' => 'required|max:1024',
        'telefone' => "required|min:10",
        'kwp' => "required",
        'fotovoltaico' => "required",
        'inversor' => "required",
        'datasheet' => "required|max:1024",
        'dijuntor_id' => "required",
    ];

    protected $messages = [
        'identificacao_pf_pj.max' => 'Arquivo é maior que 1 mb',
        'procuracao.max' => 'Arquivo é maior que 1 mb',
        'fatura_da_uc.max' => 'Arquivo é maior que 1 mb',
        'padrao_de_entrada.max' => 'Arquivo é maior que 1 mb',
        'telefone.min' => 'Telefone deve ter no minimo 11 digitos',
        'datasheet.max' => 'Arquivo é maior que 1 mb',

        'identificacao_pf_pj.required' => 'Arquivo é obrigatorio',
        'procuracao.required' => 'Arquivo é obrigatorio',
        'fatura_da_uc.required' => 'Arquivo é obrigatorio',
        'padrao_de_entrada.required' => 'Arquivo é obrigatorio',
        'telefone.required' => 'Necessario informar o telefone',
        'kwp.required' => 'Arquivo é obrigatorio',
        'fotovoltaico.required' => 'Arquivo é obrigatorio',
        'inversor.required' => 'Arquivo é obrigatorio',
        'datasheet.required' => 'Arquivo é obrigatorio',
        'dijuntor_id.required' => 'Campo Origatorio',

    ];

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

    public function save()
    {
        $caminho = "documentos/" . auth()->user()->id;
        $this->validate();

        $identificacao_pf_pj_path = $this->identificacao_pf_pj->store($caminho);
        $procuracao_path = $this->procuracao->store($caminho);
        $fatura_da_uc_path = $this->fatura_da_uc->store($caminho);
        $padrao_de_entrada_path = $this->padrao_de_entrada->store($caminho);
        $datasheet_path = $this->datasheet->store($caminho);

        DB::beginTransaction();
        try {

            $user_id = auth()->user()->id;

            $register = Register::create([
                'user_id' => $user_id,
                'identificacao_pf_pj' => $identificacao_pf_pj_path,
                'tipo_pessoa' => $this->tipo_pessoa,
                'procuracao' => $procuracao_path,
                'fatura_da_uc' => $fatura_da_uc_path,
                'padrao_de_entrada' => $padrao_de_entrada_path,
                'dijuntor_id' => $this->dijuntor_id,
                'observacao' => $this->observacao,
                'kwp' => $this->kwp,
                'fotovoltaico' => $this->fotovoltaico,
                'inversor' => $this->inversor,
                'datasheet' => $datasheet_path,
            ]);

            $status_do_projeto = StatusProjet::find(1);

            $requestUser = UserRequest::create([
                'customer_id' => $user_id,
                'request_id' => $register->id,
                'status_id' => $status_do_projeto->id,
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
        DB::commit();
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
