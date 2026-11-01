<?php

namespace App\Http\Controllers;

use App\Models\Painting;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class PaintingController extends Controller
{
    // Список всех картин (маршрут GET /paintings)
    public function index()
    {
        $paintings = Painting::all();
        return view('paintings.index', compact('paintings'));
    }

    // Форма добавления новой картины (GET /paintings/create)
    public function create()
    {
        return view('paintings.create');
    }

    // Сохранение новой картины в базе данных (POST /paintings)
    public function store(Request $request)
    {
        // Проверка данных на стороне сервера
        $data = $this->validateData($request);

        // Если загружено изображение, сохраняем его в storage/app/public/paintings
        if ($request->hasFile('image')) {
       $data['image'] = $this->saveImage($request->file('image'));
        } else {
            unset($data['image']);
        }

        Painting::create($data);

        return redirect()->route('paintings.index')->with('success', 'Картина добавлена');
    }

    // Страница с подробной информацией о картине (GET /paintings/{painting})
    public function show(Painting $painting)
    {
        return view('paintings.show', compact('painting'));
    }

    // Форма редактирования картины (GET /paintings/{painting}/edit)
    public function edit(Painting $painting)
    {
        return view('paintings.edit', compact('painting'));
    }

    // Сохранение изменений (PUT /paintings/{painting})
    public function update(Request $request, Painting $painting)
    {
        $data = $this->validateData($request);

        // Если выбран новый файл, заменяем изображение
        if ($request->hasFile('image')) {
$data['image'] = $this->saveImage($request->file('image'));
        } else {
            unset($data['image']); // иначе остаётся старое изображение
        }

        $painting->update($data);

        return redirect()->route('paintings.show', $painting)->with('success', 'Картина обновлена');
    }

    // Удаление картины (DELETE /paintings/{painting}), «мягкое» удаление (Soft Delete)
    public function destroy(Painting $painting)
    {
        $painting->delete();

        return redirect()->route('paintings.index')->with('success', 'Картина удалена');
    }
        // Изменение размера изображения под вёрстку (600×400) и сохранение
    private function saveImage(UploadedFile $file): string
    {
        $manager = new ImageManager(new Driver());
        $image = $manager->read($file->getRealPath());
        $image->cover(600, 400); // обрезка и масштабирование под карточку

        $path = 'paintings/' . uniqid() . '.jpg';
        Storage::disk('public')->put($path, (string) $image->toJpeg(85));

        return $path;
    }

    // Правила валидации, общие для store и update
    private function validateData(Request $request): array
    {
        $rules = [
            'title'       => 'required|string|max:255',
            'author'      => 'required|string|max:255',
            'year'        => 'required|integer|min:1000|max:2100',
            'technique'   => 'required|string|max:255',
            'size'        => 'required|string|max:100',
            'location'    => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|max:2048',
        ];

        // Сообщения об ошибках на русском языке
        $messages = [
            'required'  => 'Поле «:attribute» обязательно для заполнения.',
            'string'    => 'Поле «:attribute» должно быть текстом.',
            'max'       => 'Поле «:attribute» слишком длинное (максимум :max).',
            'integer'   => 'Поле «:attribute» должно быть целым числом.',
            'year.min'  => 'Год не может быть меньше :min.',
            'year.max'  => 'Год не может быть больше :max.',
            'image'     => 'Файл должен быть изображением.',
            'image.max' => 'Размер изображения не должен превышать 2 МБ.',
        ];

        // Русские названия полей для сообщений
        $attributes = [
            'title'       => 'Название',
            'author'      => 'Автор',
            'year'        => 'Год',
            'technique'   => 'Техника',
            'size'        => 'Размер',
            'location'    => 'Где хранится',
            'description' => 'Описание',
            'image'       => 'Изображение',
        ];

        return $request->validate($rules, $messages, $attributes);
    }
}