<div class="modal fade" id="addCity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add city</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="addCityForm">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="addName" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="addName" placeholder="City name">
                        </div>
                        <div class="mb-3">
                            <label for="addPopulation" class="form-label">Population</label>
                            <input type="number" name="population" class="form-control" id="addPopulation"
                                   placeholder="City population">
                            <input type="hidden" name="addCity">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn-add-submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>