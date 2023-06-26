const FILE_TYPES = ['gif', 'png', 'jpeg', 'jpg'];

const addFormContainer = document.querySelector('.add-form-container');
const addBtn = document.querySelector('.goods__add-btn');
const closeBtn = addFormContainer.querySelector('.add-form__close-btn');
const addForm = addFormContainer.querySelector('.add-form');

const chooserAvatar = document.querySelector('.add-form-photo__field input[type=file]');
const previewAvatar = document.querySelector('.add-form-photo__preview img');

const preparationPhoto = (type, preview) => {
    const file = type.files[0];
    const fileName = file.name.toLowerCase();
    const matches = FILE_TYPES.some((it) => fileName.endsWith(it));
    if (matches) {
      preview.src = URL.createObjectURL(file);
    }
};
  
const createImg = (container) => {
  const photoElement = document.createElement('img');
  photoElement.style.width = 40;
  photoElement.style.height = 40;
  container.append(photoElement);
  return photoElement;
};
  
chooserAvatar.addEventListener('change', () => preparationPhoto(chooserAvatar, previewAvatar));

const isEscapeKey = (evt) => evt.key === 'Escape';

addBtn.addEventListener('click', () => {
    addFormContainer.style.display = 'block';
    document.addEventListener('keydown', onFormEscKeydown);

});

const onFormEscKeydown = (evt) => {
    if (isEscapeKey(evt)) {
      evt.preventDefault();
      closeForm();
    }
};

closeBtn.addEventListener('click', closeForm);

function closeForm () {
    addFormContainer.style.display = 'none';
    document.removeEventListener('keydown', onFormEscKeydown);
    addForm.reset();
  }
