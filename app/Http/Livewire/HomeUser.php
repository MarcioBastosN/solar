<?php

namespace App\Http\Livewire;

use App\Models\Dijuntor;
use App\Models\Register;
use App\Models\StatusProjet;
use App\Models\UserKit;
use App\Models\UserRequest;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class HomeUser extends Component
{

    use WithFileUploads;
    //controller exibir campos da view
    public $exibir_empresa = false, $possui_kit;
    // arquivos
    public $rg_cnh, $cnpj, $procuracao, $fatura_da_uc, $padrao_de_entrada;
    // nao obrigatorios opcinal
    public $kwp, $fotovoltaico, $inversor, $datasheet,  $kit_id;
    // obrigatorio
    public $telefone;
    //
    public $tipo_pessoa = 'pf';

    protected $rules = [
        'rg_cnh' => 'max:1024',
        'cnpj' => 'max:1024',
        'procuracao' => 'max:1024',
        'fatura_da_uc' => 'required|max:1024',
        'padrao_de_entrada' => 'required|max:1024',
        'telefone' => "required|min:10",
    ];

    protected $messages = [
        'rg_cnh.max' => 'Arquivo é maior que 1 mb',
        'cnpj.max' => 'Arquivo é maior que 1 mb',
        'procuracao.max' => 'Arquivo é maior que 1 mb',

        'fatura_da_uc.max' => 'Arquivo é maior que 1 mb',
        'fatura_da_uc.required' => 'Arquivo é obrigatorio',
        'padrao_de_entrada.max' => 'Arquivo é maior que 1 mb',
        'padrao_de_entrada.required' => 'Arquivo é obrigatorio',

        'telefone.required' => 'Necessario informar o telefone',
        'telefone.min' => 'Telefone deve ter no minimo 11 digitos'
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

    public function updated($fatura_da_uc)
    {
        $this->validateOnly($fatura_da_uc);
    }

    public function save()
    {
        $caminho = "documentos/" . auth()->user()->id;
        $this->validate();
        $rg_path = null;
        $cnpj_path = null;
        $procuracao_path = null;
        $fatura_da_uc_path = null;
        $padrao_de_entrada_path = null;
        $datasheet_path = null;
        if (!empty($this->rg_cnh)) {
            $rg_path = $this->rg_cnh->store($caminho);
        }
        if (!empty($this->cnpj)) {
            $cnpj_path = $this->cnpj->store($caminho);
        }
        if (!empty($this->procuracao)) {
            $procuracao_path = $this->procuracao->store($caminho);
        }
        if (!empty($this->fatura_da_uc)) {
            $fatura_da_uc_path = $this->fatura_da_uc->store($caminho);
        }
        if (!empty($this->padrao_de_entrada)) {
            $padrao_de_entrada_path = $this->padrao_de_entrada->store($caminho);
        }
        if (!empty($this->datasheet)) {
            $datasheet_path = $this->datasheet->store($caminho);
        }

        // 1 passo salvar documentos (tabela Register)
        DB::beginTransaction();
        try {

            $user_id = auth()->user()->id;

            $register = Register::create([
                'user_id' => $user_id,
                'rg_cnh' => $rg_path,
                'tipo_pessoa' => $this->tipo_pessoa,
                'cnpj' => $cnpj_path,
                'procuracao' => $procuracao_path,
                'fatura_da_uc' => $fatura_da_uc_path,
                'padrao_de_entrada' => $padrao_de_entrada_path,
            ]);

            $status_do_projeto = StatusProjet::find(1);

            $requestUser = UserRequest::create([
                'customer_id' => $user_id,
                'request_id' => $register->id,
                'status_id' => $status_do_projeto->id,
            ]);


            if (!empty($this->kwp) || !empty($this->fotovoltaico) || !empty($this->inversor) || !empty($this->datasheet_path)) {
                DB::transaction(fn () => UserKit::create(
                    [
                        'customer_id' => auth()->user()->id,
                        'kwp' => $this->kwp,
                        'fotovoltaico' => $this->fotovoltaico,
                        'inversor' => $this->inversor,
                        'datasheet' => $datasheet_path,
                    ]
                ));
            }
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
        DB::commit();
        return redirect()->route('cliente.porjects');
    }

    public function render()
    {
        $dijuntores = Dijuntor::all();
        return view('livewire.home-user')->with(compact('dijuntores'));
    }
}
