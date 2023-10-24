<?php

namespace App\Http\Controllers;
use App\Models\Comic;


use Illuminate\Http\Request;

class ComicController extends Controller
{
    public function index()
  {
    $comics = Comic::all();
    return view('comic.index', compact('comics'));
  }


  public function create()
  {
      return response(view('comic.create'));
  }
  public function store(Request $request)
  {
      $data = $request->all();
   //   $this->validation($data);

      $comic = new Comic();
      $comic->fill($data);
      $comic->save();
      return response(redirect()->route('comic.show', $comic)
          // * To add flash messages
          ->with('message', 'Comic saved succesfully!')
          ->with('message_type', 'success'));
  }
  public function show(Comic $comic)
  {
      return response(view('comic.show', compact('comic')));
  }
  public function edit(Comic $comic)
  {
      return response(view('comic.edit', compact('comic')));
  }

  public function update(Request $request, Comic $comic)
  {
      $data = $request->all();
  //    $this->validation($data);
      $comic->update($data);
      return response(redirect()->route('comic.show', $comic)
          // * To add flash messages
          ->with('message', 'Comic edited succesfully!')
          ->with('message_type', 'success'));
  }

  public function destroy(Comic $comic)
  {
      $comic->delete();
      // * Redirect to index
      return response(redirect()->route('comic.index')
          // * To add flash messages
          ->with('message', 'Comic deleted succesfully!')
          ->with('message_type', 'danger'));

  }

  private function validation($data)
  {
      $validator = Validator::make(
          $data,
          [
              'title' => 'required|string',
              'thumb' => 'required|string',
              'price' => 'required|integer',
              'series' => 'required|string',
              'sale_date' => 'required|integer',
              'type' => 'required|in:graphic novel,comic book',
          ],
          [
              'title.required' => 'Il Titolo è obbligatorio',
              'thumb.required' => 'La Thumb è obbligatoria',

              'price.required' => 'Il Prezzo è obbligatorio',
              'price.integer' => 'Il Prezzo inserito mon è numero',

              'series.string' => 'ciao',

              'sale_date.required' => 'La Data è obbligatoria',
              'sale_date.integer' => 'La Data inserita mon è numero',

              'type.required' => 'IL Tipo è obbligatoria',
              'type.in' => 'Il tipo deve un valore compreso tra "graphic novel", "comic book"',
          ]
      )->validate();

      return $validator;
  }

 /* private function validation($data)
  {
      Validator::make(
          // Data to validate
          $data,
          // * Keys with value type for validation
          [
              'title' => 'required|string|max:50',
              'description' => 'required|string',
              'thumb' => 'required|url',
              'price' => 'required|string|max:8',
              'series' => 'required|string|max:50',
              'sale_date' => 'required|string|max:12',
              'type' => 'required|string|max:20',
          ],
          // * Error messages
          [
              'title.required' => 'You have to set a comic title',
              'title.string' => 'Title must be a string',
              'title.max' => 'Title can\'t exceed 50 characters',

              'description.required' => 'You have to set a comic description',
              'description.string' => 'You must be a string',

              'thumb.required' => 'You have to set a comic url image',
              'thumb.url' => 'Insert a valid url',

              'price.required' => 'You have to set a comic price',
              'price.string' => 'Price must be a string',
              'price.max' => 'Price it\'s limited to 8 chars',

              'series.required' => 'You have to set a comic series',
              'series.string' => 'Series must be a string',
              'series.max' => 'Series can\'t excede 50 characters',

              'sale_date.required' => 'You have to set a comic sales date',
              'sale_date.string' => 'Sales date must be a string',
              'sale_date.max' => 'Sales date can\'t excede 12 characters',

              'type.required' => 'You have to set a comic type',
              'type.string' => 'Type must be a string',
              'type.max' => 'Type can\'t excede 20 characters',
          ]
      )->validate();

  }
*/


}
