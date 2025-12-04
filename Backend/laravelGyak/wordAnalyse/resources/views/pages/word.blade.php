@extends('layouts.app')

@section('page_title', 'WordAnalyser - Elemzés')

@section('content')
    <div class="has-text-centered">
        <div class="card is-inline-block has-text-left">
            <div class="card-content">
                <table class="table is-striped">
                    <tbody>
                        <tr>
                            <th>Eredeti szöveg</th>
                            <td>{{ $originalText }}</td>
                        </tr>
                        <tr>
                            <th>Hossz</th>
                            <td>{{ $textLenght }}</td>
                        </tr>
                        <tr>
                            <th>Kisbeűs</th>
                            <td>{{ $lowerText }}</td>
                        </tr>
                        <tr>
                            <th>Nagybetűs</th>
                            <td>{{ $upperText }}</td>
                        </tr>
                        <tr>
                            <th>Palindrom</th>
                            <td>{{ $isPal ? "Igen ✅" : "Nem ❌"}}</td>
                        </tr>
                        <tr>
                            <th>Szótagbecslés</th>
                            <td>{{ $textSyllables }}</td>
                        </tr>
                        <tr>
                            <th>Betugyakoriság</th>
                            <td>
                                @foreach($letterFrequency as $key => $value)
                                    <span class="tag is-warning is-light">
                                        {{ $key }} → {{ $value }}
                                    </span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
