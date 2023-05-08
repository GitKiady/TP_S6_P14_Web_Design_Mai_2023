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
              <label class="card-title">La liste des articles publié</label>

              <!-- Table with stripped rows -->
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
              	<div class="dataTable-top">
              		<div class="dataTable-dropdown">
              			</div>
              			<div class="dataTable-search">
              				<input class="dataTable-input" placeholder="Search..." type="text">
              			</div>
              		</div>
              		<div class="dataTable-container">
              			<div class="dataTable-bottom">
		          	<div class="dataTable-info"><a href="/insert/article">New article</a></div>
			          	<nav class="dataTable-pagination">
			          		<ul class="dataTable-pagination-list"></ul>
			          	</nav>
			          </div>
		          </div>
              	<table class="table datatable dataTable-table">
                <thead>
	                  <tr>
	                  	<th scope="col" data-sortable=""><a href="#" class="dataTable-sorter">Titre</a></th>
	                  	<th scope="col" data-sortable=""><a href="#" class="dataTable-sorter">Description</a></th>
	                  	<th scope="col" data-sortable=""><a href="#" class="dataTable-sorter">Categorie</a></th>
	                  	<th scope="col" data-sortable=""><a href="#" class="dataTable-sorter">Date de publication</a></th>
	                  </tr>
	            </thead>
                <tbody>
                	<?php for ($i=0; $i < count($articles); $i++) { ?>
                	<tr>
	                	<th scope="row">{{ $articles[$i]->titre }}</th>
	                	<td>{{ $articles[$i]->description }}</td>
	                	<td>{{ $articles[$i]->libelle }}</td>
	                	<td>{{ $articles[$i]->date_publication }}</td>
	                	<td><a href="/update/article-<?php echo $articles[$i]->id ?>">Modifier</a></td>
	                	<td><a href="/delete/article-<?php echo $articles[$i]->id ?>">Supprimer</a></td>
	                </tr>
	                <?php } ?>
               	</tbody>
              </table>
          </div>
          
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

    </div>
  </main><!-- End #main -->


	@extends('../layout/script')
</body>
</html>