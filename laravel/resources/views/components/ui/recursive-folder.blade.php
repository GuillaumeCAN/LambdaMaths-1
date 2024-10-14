{{--
<ul class="hs-tree-view hs-tree-view-open">
  @foreach ($tree as $key => $value)
      @if ($key === 'files')
          @foreach ($value as $file)

              <li>
                  <div class="hs-tree-view-item">
                      <span class="hs-tree-view-icon">&#128196;</span>
                      <a href="{{ asset('storage/' . $parent . '/' . $file) }}" target="_blank" class="hs-tree-view-label">{{ $file }}</a>
                      <form action="{{ route('delete.file') }}" method="POST" style="display:inline" class="ml-2">
                          @csrf
                          <input type="hidden" name="file_path" value="{{ $parent . '/' . $file }}">
                          <button type="submit" class="text-red-500" onclick="return confirm('Es-tu sûr de vouloir supprimer ce fichier ?')">Supprimer</button>
                      </form>
                  </div>
              </li>
          @endforeach
      @else
          <li class="hs-tree-view-item">
              <button type="button" class="hs-tree-view-toggle">
                  <span class="hs-tree-view-icon">&#128193;</span>
                  <span class="hs-tree-view-label">{{ $key }}</span>
              </button>
              <form action="{{ route('delete.folder') }}" method="POST" style="display:inline" class="ml-2">
                  @csrf
                  <input type="hidden" name="folder_path" value="{{ $parent . '/' . $key }}">
                  <button type="submit" class="text-red-500" onclick="return confirm('Es-tu sûr de vouloir supprimer ce dossier ?')">Supprimer</button>
              </form>
              <ul class="hs-tree-view-content">
                  @include('partial-test', ['tree' => $value, 'parent' => $parent . '/' . $key])
              </ul>
          </li>
      @endif
  @endforeach
</ul>

 --}}

@foreach($tree as $subKey => $subValue)
    @if ($subKey !== 'files')
        <option value="{{ $parent }}/{{ $subKey }}">{{ $parent }}/{{ $subKey }}</option>
        @include('components.ui.recursive-folder', ['tree' => $subValue, 'parent' => $parent . '/' . $subKey])
    @endif
@endforeach
