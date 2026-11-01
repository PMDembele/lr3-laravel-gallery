public function up(): void
{
    Schema::create('paintings', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('author');
        $table->unsignedSmallInteger('year');
        $table->string('technique');
        $table->string('size');
        $table->string('location');
        $table->text('description');
        $table->string('image')->nullable();
        $table->timestamps();
        $table->softDeletes();
    });
}