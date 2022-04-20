<template>
  <section class="forms">
    <div class="page-header">
      <h3 class="page-title">Редактирование записи</h3>
    </div>
    <div class="row">
      <div class="col-md-10 d-flex align-items-stretch grid-margin">
        <div class="row flex-grow">
          <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Создание поста</h4>
                <p class="card-description">Заголовок поста</p>
                <form class="forms-sample" @submit.prevent="create">
                  <b-form-group horizontal label="Category" label-for="cat">
                    <b-form-select
                      v-model="selectedCategory"
                      :options="optionsCategory"
                      id="cat"
                      placeholder="Select Category"
                    />
                  </b-form-group>
                  <b-form-group horizontal label="Статус" label-for="status">
                    <b-form-select
                      v-model="selectedStatus"
                      :options="optionsStatus"
                      id="status"
                      placeholder="Select Status"
                    />
                  </b-form-group>
                  <b-form-group label="Заголовок" label-for="title">
                    <b-form-input
                      type="text"
                      id="title"
                      v-model="title"
                      placeholder="Заголовок"
                    ></b-form-input>
                  </b-form-group>
                  <b-form-group label="Slug" label-for="slug">
                    <b-form-input
                      type="text"
                      id="slug"
                      v-model="slug"
                      placeholder="Slug"
                    ></b-form-input>
                  </b-form-group>
                  <b-form-group label="Краткое содержание" label-for="Resume">
                    <b-form-textarea
                      id="resume"
                      v-model="preview"
                      placeholder="Краткое содержание"
                      :rows="3"
                      :max-rows="6"
                    ></b-form-textarea>
                  </b-form-group>
                  <b-form-group>
                    <editor
                      id="content"
                      api-key="no-api-key"
                      v-model="content"
                      value=""
                      :init="{
                        height: 700,
                        menubar: true,
                        plugins: [
                          'advlist autolink lists link image charmap print preview anchor',
                          'searchreplace visualblocks code fullscreen',
                          'insertdatetime media table paste code help wordcount',
                          'codesample toc autosave',
                        ],
                        toolbar:
                          'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image \
                          formatselect | bold italic backcolor | \
           alignleft aligncenter alignright alignjustify | \
           bullist numlist outdent indent | removeformat | help',
                      }"
                    />
                  </b-form-group>
                  <div class="d-flex">
                    <b-button type="submit" variant="success" class="mr-2"
                      >Создать</b-button
                    >
                    <b-button variant="dark">Cancel</b-button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import axios from "axios";
import Editor from "@tinymce/tinymce-vue";

export default {
  components: {
    editor: Editor,
  },
  name: "createForm",
  data() {
    return {
      title: "",
      content: "",
      slug: "",
      preview: "",
      selectedCategory: null,
      selectedStatus: null,
      optionsCategory: [],
      category: [],
      optionsStatus: [
        { value: "public", text: "public" },
        { value: "draft", text: "draft" },
      ],
      file: null,
    };
  },
  methods: {
    getPostData() {
      let self = this;
      axios
        .get("/api/posts/create")
        .then(function (response) {
          self.category = response.data.categorys;
          self.optionsCategory = self.category.map(function (category) {
            return { value: category.id, text: category.title };
          });
        })
        .catch(function (error) {
          console.error(error);
        });
    },
    async create() {
      let self = this;
      axios.get("/sanctum/csrf-cookie").then((response) => {
        axios
          .post("/api/posts/store", {
            post_id: this.$route.params.id,
            title: self.title,
            text: self.content,
            slug: self.slug,
            preview: self.preview,
            category_id: self.selectedCategory,
            status: self.selectedStatus,
          })
          .then((response) => {
            if (response.status) {
              console.log("Вызвали алерт");
              this.$router.push({ path: '/posts/list' });
            } else {
              console.log("Не работает");
              console.log(response.status);
            }
          })
          .catch(function (error) {
            console.log(response);
            console.error(error);
          });
      });
    },
  },
  mounted: function () {
    this.getPostData();
  },
};
</script>