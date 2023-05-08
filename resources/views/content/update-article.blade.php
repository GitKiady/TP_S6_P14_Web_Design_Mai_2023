<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administrateur</title>
	@extends('../layout/link')
</head>
<body>
<main id="main" class="main">
	@extends('../header')
	@extends('../aside')
    <div class="container">

      <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Modification article</h5>

              <div class="col-xxl-3 col-md-3">
              <div class="card info-card sales-card">


                <div class="card-body">

                  <div class="d-flex align-items-center">
                    
                    <img src="{{ $article[0]->image }}" alt="article-img">

                  </div>
                </div>

              </div>
            </div>

              <!-- General Form Elements -->
              <form action="/update/article/submit" method="POST" enctype="multipart/form-data">
              	@csrf
                <input type="hidden" class="form-control" name="id" value="{{$article[0]->id}}">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Titre</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="titre" value="{{$article[0]->titre}}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="description" value="{{$article[0]->description}}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Mots clés</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="keyword" value="{{$article[0]->keyword}}">
                  </div>
                </div>
                

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Categorie</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="categorie">
                    	@foreach($categories as $categorie)
                        <?php if($categorie->id == $article[0]->idcategorie) { ?>
                      	 <option selected value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                        <?php } else { ?>
                          <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                        <?php } ?>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Contenue</label>
                  <div class="col-sm-10">
                    <textarea id="editor" name="content" class="form-control" style="height: 100px" >{{$article[0]->contenue}}</textarea>
                  </div>
                </div>


                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Submit Button</label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit Form</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>

    </div>
  </main><!-- End #main -->


	@extends('../layout/script')
	<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
	<script>
	CKEDITOR.replace( 'editor' );
	</script>
</body>
</html>