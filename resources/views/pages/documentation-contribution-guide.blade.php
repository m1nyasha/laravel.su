@extends('layout')
@section('title', 'Реклама')

@section('content')

    <div class="container py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <div class="bg-dark-subtle dashed p-4 rounded position-relative">
                    <a href="#" class="position-absolute start-0 end-0 top-0 bottom-0 z-1"></a>


                    <div class="row g-4 justify-content-between align-items-center">
                        <div class="col-sm-7">
                            <div class="row g-3">

                                <div class="col-12">
                                    <h4 class="mb-0">PHP Russia</h4>
                                </div>

                                <!-- Date -->
                                <div class="col-6">
                                    <small class="text-muted">Дата</small>
                                    <h6>11 Ноября</h6>
                                </div>
                                <!-- Time -->
                                <div class="col-6">
                                    <small class="text-muted">Время</small>
                                    <h6>Начало в 9 утра</h6>
                                </div>
                                <!-- Address -->
                                <div class="col-12">
                                    <small class="text-muted">Адрес</small>
                                    <h6>Москва, Крокус Сити Хол</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center">
                            <div class="ticket-border">
                                <!-- QR code -->
                                <img class="img-fluid mx-auto user-select-none" src="/img/qr-code.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">Нельзя пропустить</span>
                <h1 class="display-5 fw-bold mb-4">Как правильно переводить документацию Laravel</h1>
                <p class="pe-5">
                    Рассказать, что Laravel на столько популярен в мире PHP что нет какой-либо конференции, где не
                    спикеры не упоминали Laravel
                </p>
            </div>
        </div>
    </div>


    <div class="container py-5">

        <div class="row">
            <div class="col-7 mx-auto">
                <main>
                    <p>Оригинал англоязычной документации находится по адресу <a href="https://github.com/laravel/docs">https://github.com/laravel/docs</a>.
                    </p>
                    <p>Перевод документации на русский находится на гитхабе по адресу <a
                            href="https://github.com/LaravelRUS/docs">https://github.com/LaravelRUS/docs</a> . Апдейт
                       перевода осуществляется пулл-реквестами в этот репозиторий.</p>
                    <p>Редактирование репозитория с переводом может происходить в двух вариантах - внесение
                       незначительных изменений и обновление перевода файла до актуального.</p>
                    <h3>Внесение мелких изменений</h3>
                    <p>Если вы заметили опечатку, некрасивый перевод, неподходящее употребление термина - вы можете
                       просто отредактировать файл прямо на гитхабе. Не нужно уметь пользоваться git , гитхаб сам
                       сделает пулл-реквест.
                       Если же вы заметили, что в русской документации отсутствует фича, которая есть в документации
                       англоязычной, вам нужно использовать другой вариант работы.</p>
                    <h3>Обновление перевода до актуального</h3>
                    <h4>Формат файла перевода</h4>
                    <p>Файлы русскоязычной документации имеют определенный формат. В начале каждого файла должна быть
                       конструкция следующего вида (обратите внимание, что в середине - пустая строка):</p>
                    <pre><code>git a49894e56c3ac8b837ba7d8687d94f6010cb1808

---
</code></pre>
                    <p>где <code>a49894e56c3ac8b837ba7d8687d94f6010cb1808</code> - полный номер коммита в англоязычной
                       документации, последнего актуального на момент редактирования для данного файла. Это нужно для
                       того, чтобы понимать, что именно переведено, а что еще нет - чтобы следующий переводчик не
                       просматривал глазами весь файл в поисках изменений, а просто внес то, что ему покажет <code>git
                                                                                                                   diff</code>
                    </p>
                    <p>Итак, последовательность действий при переводе документации следующая.</p>
                    <h4>Настройка git difftool</h4>
                    <p>Если вы этого не сделали, установите себе инструмент для визуального сравнения разных версий
                       текста. Их существует огромное множество, кросплатформенный бесплатный вариант - KDiff3 <a
                            href="http://sourceforge.net/projects/kdiff3/">http://sourceforge.net/projects/kdiff3/</a>
                    </p>
                    <p>После установки, отредактируйте глобальный файл <code>.gitconfig</code> , который находится в
                       папке пользователя (для Windows это <code>C:\Users\(username)</code>) . Добавьте туда следующие
                       строки:</p>
                    <pre><code>[diff]
    tool = kdiff3

[merge]
    tool = kdiff3

[mergetool "kdiff3"]
    path = C:/Program Files/KDiff3/kdiff3.exe
    keepBackup = false
    trustExitCode = false
</code></pre>
                    <p>где path - это путь до исполняемого файла kdiff3.</p>
                    <p>Если у вас стоит другая diff-программа, например Araxis Merge или DiffMerge, то погуглите, как её
                       настроить для гита - '(program name) difftool gitconfig'</p>
                    <h4>Получение текста для перевода</h4>
                    <p>Склонируйте репозиторий оригинальной документации</p>
                    <pre><code>git clone https://github.com/laravel/docs.git original_docs
cd original_docs
git checkout master
</code></pre>
                    <p>или, если он уже у вас есть, обновите нужную вам ветку</p>
                    <pre><code>original_docs&gt; git checkout master
original_docs&gt; git reset HEAD --hard
original_docs&gt; git pull origin master
</code></pre>
                    <p>На странице <a href="http://laravel.su/status">Прогресс перевода</a> посмотрите, какой файл
                       нуждается в переводе и скопируйте соответствующую команду <code>git difftool xxxxxxx xxxxxxx
                                                                                       file.md</code> , чтобы узнать,
                       что именно нужно переводить</p>
                    <pre><code>original_docs&gt; git difftool a06af42 bc291ef controllers.md
</code></pre>
                    <p>Git захочет запустить внешнюю diff-программу, настроенную на предыдущем шаге, соглашайтесь.</p>
                    <p>В появившейся программе справа будет старый файл, а слева - новый, цветом отмечены расхождения в
                       версиях.</p>
                    <p>Внесите необходимые изменения в файл перевода. Изменения нужно внести <strong>все</strong> ,чтобы
                       переведенный файл полностью соответствовал оригинальному. Нельзя останавливаться на середине и
                       пушить изменения - следующий человек может подумать, что файл уже переведён полностью.</p>
                    <h4>Финальные шаги</h4>
                    <p><strong>Обязательно</strong> измените в начале переводимого файла полный номер коммита. Этот
                                                    номер можно взять на той же странице <a
                            href="http://laravel.su/docs/status">прогресса перевода</a> в столбце "Текущий оригинал".
                    </p>
                    <p>Закоммитьте изменения и пошлите пулл-реквест из гитхаба. Старайтесь делать изменение только
                       одного файла во время одного коммита.</p>

                </main>
            </div>
        </div>
    </div>

@endsection
