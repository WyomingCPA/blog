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
                <h4 class="card-title">Редактирования поста</h4>
                <p class="card-description">Заголовок поста</p>
                <form class="forms-sample" @submit.prevent="update">
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
                      value="content"
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
                      ><span v-show="!loading"> Обновить </span>
                      <div
                        v-show="loading"
                        class="spinner-border spinner-border-sm"
                        role="status"
                      >
                        <span class="sr-only">Loading...</span>
                      </div>
                    </b-button>
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
  name: "editForm",
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
      loading: false,
    };
  },
  methods: {
    getPostData() {
      let self = this;
      axios
        .get("/api/posts/edit/" + this.$route.params.id)
        .then(function (response) {
          self.title = response.data.post.title;
          self.content = response.data.post.text;
          self.slug = response.data.post.slug;
          self.preview = response.data.post.preview;
          self.category = response.data.categorys;
          self.optionsCategory = self.category.map(function (category) {
            if (category.id == response.data.post.category_id) {
              self.selectedCategory = category.id;
            }
            return { value: category.id, text: category.title };
          });

          self.selectedStatus = response.data.post.status;
        })
        .catch(function (error) {
          console.error(error);
        });
    },
    async update() {
      let self = this;
      this.loading = true;
      axios.get("/sanctum/csrf-cookie").then((response) => {
        axios
          .post("/api/posts/update", {
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
              this.makeToast('success');
              self.loading = false;
            } else {
              console.log("Не работает");
              console.log(response.status);
              self.loading = false;
            }
          })
          .catch(function (error) {
            console.log(response);
            console.error(error);
          });
      });
    },
    makeToast(variant = null) {
      this.$bvToast.toast("Данные успешно обновлены", {
        title: `${variant || "default"}`,
        variant: variant,
        solid: true,
      });
    },
  },
  mounted: function () {
    this.getPostData();
  },
};
</script>