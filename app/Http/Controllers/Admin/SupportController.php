<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    // promoçao de atributos
    public function __construct(
        protected SupportService $service
    ) {}

    public function index(Request $request) 
    {
        // $supports = Support::all();
        $supports = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 1),
            filter: $request->filter,
        );

        $filters = ['filter' => $request->get('filter', '')];

        return view('admin.supports.index', compact('supports', 'filters'));

        // paginate
        // $supports = Support::paginate();
        // dd($supports);
        // paginate na view
        // {{ $supports->path() }}

        // dd($supports->items());

    }

    public function show(string $id)
    {
        // Support::find($id);
        // Support::where('id', $id)->first();
        // Support::where('id', '!=', $id)->first();
        if (!$support = $this->service->findOne($id)) {
            return redirect()->back();
        }

        return view('admin.supports.show', compact('support'));
    }

    public function create() 
    {
        return view('admin.supports.create');
    }

    public function store(StoreUpdateSupport $request, Support $support) 
    {
        $this->service->new(CreateSupportDTO::makeFromRequest($request));

        return redirect()->route('supports.index')
                        ->with('message', 'Cadastrado com sucesso.');
    }

    public function edit(string $id)
    {
        // if (!$support = Support::where('id', $id)->first()) {
        if (!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin.supports.edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request, Support $support, string $id)
    {

        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request));

        if (!$support) {
            return back();
        }

        // $support->subject = $request->subject;
        // $support->body = $request->body;
        // $support->save();

        // $support->update($request->only([
        //     'subject', 'body'
        // ]));

        return redirect()->route('supports.index')
                        ->with('message', 'Atualizado com sucesso.');
    }

    public function destroy(string $id)
    {
        $this->service->delete($id);

        return redirect()->route('supports.index')
                        ->with('message', 'Deletado com sucesso.');
    }
}
