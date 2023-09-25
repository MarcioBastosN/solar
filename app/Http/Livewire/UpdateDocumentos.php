<?php

namespace App\Http\Livewire;

use App\Models\Register;
use App\Models\ValidaDocumento;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class UpdateDocumentos extends Component
{
    use WithFileUploads, Actions;

    public $identificacao_pf_pj, $Procuracao, $Fatura, $Padrao, $Datasheet;

    public $arquivosParaCorrigir, $exibir_empresa, $registro_id;

    protected $rules = [
        'identificacao_pf_pj' => 'max:1024',
        'Procuracao' => 'max:1024',
        'Fatura' => 'max:1024',
        'Padrao' => 'max:1024',
        'Datasheet' => "max:1024",
    ];

    protected $messages = [
        'identificacao_pf_pj.max' => 'Arquivo é maior que 1 mb',
        'Procuracao.max' => 'Arquivo é maior que 1 mb',
        'Fatura.max' => 'Arquivo é maior que 1 mb',
        'Padrao.max' => 'Arquivo é maior que 1 mb',
        'Datasheet.max' => 'Arquivo é maior que 1 mb',
    ];

    public function mount($id)
    {
        $this->registro_id = $id;
    }

    public function retornaViewProjetos()
    {
        return redirect()->route('cliente.porjects');
    }

    public function updated($identificacao_pf_pj)
    {
        $this->validateOnly($identificacao_pf_pj);
    }

    public function atualizar()
    {
        $count = 0;
        $this->validate();
        if (!empty($this->identificacao_pf_pj)) {
            $this->saveDoc($this->identificacao_pf_pj, "identificacao_pf_pj");
            $count += 1;
        }
        if (!empty($this->Procuracao)) {
            $this->saveDoc($this->Procuracao, "procuracao");
            $count += 1;
        }
        if (!empty($this->Fatura)) {
            $this->saveDoc($this->Fatura, "fatura_da_uc");
            $count += 1;
        }
        if (!empty($this->Padrao)) {
            $this->saveDoc($this->Padrao, "padrao_de_entrada");
            $count += 1;
        }
        if (!empty($this->Datasheet)) {
            $this->saveDoc($this->Datasheet, "datasheet");
            $count += 1;
        }

        if ($count == 0) {
            $this->notification()->error(
                $title = "Ops",
                $description = 'Você deve enviar ao menos um arquivo'
            );
        }

        $this->render();
    }

    public function saveDoc($arquivo, $nomeArquivo)
    {
        DB::beginTransaction();
        try {

            $caminho = "documentos/" . auth()->user()->id;
            $caminhi_arquivo = $arquivo->store($caminho);
            DB::transaction(fn () => Register::find($this->registro_id)->update(["$nomeArquivo" => $caminhi_arquivo]));

            DB::transaction(fn () => ValidaDocumento::where('register_id', $this->registro_id)->where('documento', 'ilike', "%" . $nomeArquivo . "%")->update(['status_id' => 1]));
        } catch (Exception $e) {
            DB::rollBack();
            $this->notification()->error(
                $title = "Error: " . $nomeArquivo,
                $description = $e->getMessage(),
            );
        }
        DB::commit();

        $this->notification()->success(
            $title = $nomeArquivo,
            $description = 'Salvo com sucesso'
        );
    }

    public function render()
    {
        $register = Register::find($this->registro_id);
        $this->exibir_empresa = $register->tipo_pessoa;
        $this->arquivosParaCorrigir = $register->validaDocumentos->where('status_id', 2);
        if ($register->validaDocumentos->where('status_id', 2)->count() == 0) {
            $this->retornaViewProjetos();
        }
        return view('livewire.update-documentos');
    }
}
