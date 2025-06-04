
    <h2>Tableau du fichier : {{ $fichier->nom_fichier }}</h2>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                @foreach($donnees[0] ?? [] as $key => $val)
                    <th>{{ $key }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($donnees as $row)
                <tr>
                    @foreach($row as $val)
                        <td>{{ $val }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

