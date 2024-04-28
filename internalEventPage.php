<?php
require_once('./page.php');
require_once('./InternalEvent.php');
class internalEventPage extends page
{
    private InternalEvent $model;
    /**
     * Get the value of model
     */ 
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the value of model
     *
     * @return  self
     */ 
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    protected function passTitle(): string
    {
        return 'passTitle';
    }
    protected function passTableName(): string
    {
        return 'passTableName';
    }
    protected function generateViewAdd(): string
    {
        return '
        <form method="POST">
            <div class="container">
            <div class="row gy-3">
                <div class="col-md-12 col-lg-6 col-xxl-4">
                    <div class="input-group">
                        <label class="input-group-text">
                            <i class="material-icons-round align-middle">label</i>
                            Title
                        </label>
                        <input class="form-control validate" name="Title">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xxl-4">
                    <div class="input-group">
                        <label class="input-group-text">
                            <i class="material-icons-round align-middle">link</i>
                            Link
                        </label>
                        <input class="form-control validate" name="Link">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xxl-4">
                    <div class="row">
                        <div class="col-auto">
                            <label class="form-check-label">
                                Public
                                <i class="material-icons-round align-middle">public</i>
                            </label>
                        </div>
                        <div class="form-switch form-check col-auto">
                            <input class="form-check-input validate" type="checkbox" name="IsPublic">
                            <label class="form-check-label">
                                <i class="material-icons-round align-middle">block</i>
                                Private
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xxl-4">
                    <div class="row">
                        <div class="col-auto">
                            <label class="form-check-label">
                                Cancelled
                                <i class="material-icons-round align-middle">cancel</i>
                            </label>
                        </div>
                        <div class="form-switch form-check col-auto">
                            <input class="form-check-input validate" type="checkbox" name="IsCancelled">
                            <label class="form-check-label">
                                <i class="material-icons-round align-middle">public</i>
                                Active
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xxl-4">
                    <div class="input-group">
                        <label class="input-group-text">
                            <i class="material-icons-round palette-accent-text-color align-middle">event</i>
                            Event date
                        </label>
                        <input class="form-control validate" type="date" name="EventDateTime">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xxl-4">
                    <div class="input-group">
                        <label class="input-group-text">
                            <i class="material-icons-round palette-accent-text-color align-middle">today</i>
                            Publish date
                        </label>
                        <input class="form-control validate" type="date" name="PublishDateTime">
                    </div>
                </div>
                <div class="col-sm-12">
                    <label class="form-label">
                        <i class="material-icons-round palette-accent-text-color align-middle">description</i>
                        Short description
                    </label>
                    <textarea class="form-control validate" name="ShortDescription"></textarea>
                </div>
                <div class="col-sm-12">
                    <label class="form-label">
                        <i class="material-icons-round palette-accent-text-color align-middle">newspaper</i>
                        Content
                    </label>
                    <textarea class="form-control validate" name="ContentHTML"></textarea>
                </div>
                <div class="col-sm-12">
                    <label class="form-label">
                        <i class="material-icons-round palette-accent-text-color align-middle">feed</i>
                        Meta description
                    </label>
                    <textarea class="form-control validate" name="MetaDescription"></textarea>
                </div>
                <div class="col-sm-12">
                    <label class="form-label">
                        <i class="material-icons-round palette-accent-text-color align-middle">subtitles</i>
                        Meta tags
                    </label>
                    <textarea class="form-control validate" name="MetaTags"></textarea>
                </div>
                <div class="col-sm-12">
                    <label class="form-label">
                        <i class="material-icons-round palette-accent-text-color align-middle">notes</i>
                        Notes
                    </label>
                    <textarea class="form-control validate" name="Notes"></textarea>
                </div>
                <div class="col-sm-12">
                    <button class="btn btn-primary" name="'.self::ACTION.'" value="'.self::ADD_NEW.'">Create </button>
                </div>
            </div>
        </div>
    </form>
        ';
    }
    protected function generateViewAll(): string
    {
        return 'generateViewAll';
    }
    protected function generateViewEdit(): string
    {
        return 'generateViewEdit';
    }
    protected function AddNew(): void
    {
        $this -> EnterModelDataFromForm();
        $db = $this -> openConnection();
    }
    protected function Edit(): void
    {
        $this -> EnterModelDataFromForm();
    }
    protected function EnterModelDataFromForm(): void
    {
        $model = new InternalEvent();
        $model -> setTitle($_POST['Title']);
        $model -> setLink($_POST['Link']);
        $model -> setShortDescription($_POST['ShortDescription']);
        $model -> setIsPublic($_POST['IsPublic'] ?? false);
        $model -> setIsCancelled($_POST['IsCancelled'] ?? false);
        $model -> setPublishDateTime($_POST['PublishDateTime']);
        $model -> setEventDateTime($_POST['EventDateTime']);
        $model -> setMetaDescription($_POST['MetaDescription']);
        $model -> setMetaTags($_POST['MetaTags']);
        $model -> setNotes($_POST['Notes']);
        $model -> setId($_POST['Id'] ?? 0);
        $model -> setContentHTML($_POST['ContentHTML']);
        $this -> setModel($model);
    }

    
}
