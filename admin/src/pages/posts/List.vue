<template>
  <section class="tables">
    <div class="page-header">
      <h3 class="page-title">Список записей</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="javascript:void(0);">Table</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Список записей
          </li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"></h4>
            <b-button
              size="sm"
              variant="success"
              @click="createPost()"
              class="mr-1"
            >
              Создать пост
            </b-button>
            <b-table responsive :items="items" :fields="fields">
              <template #cell(actions)="row">
                <b-button
                  size="sm"
                  @click="sourcePost(row.item, row.index, $event.target)"
                  class="mr-1"
                >
                  Источники
                </b-button>
                <b-button
                  size="sm"
                  @click="editPost(row.item, row.index, $event.target)"
                  class="mr-1"
                >
                  Редактировать
                </b-button>
                <b-button
                  size="sm"
                  @click="deletePost(row.item, row.index, $event.target)"
                  class="mr-1"
                >
                  Удалить
                </b-button>
              </template>
              <!-- could also be a footer field slot instead -->
              <template slot="bottom-row"> </template>
            </b-table>
            <!-- Info modal -->
            <b-modal
              ref="my-modal"
              :id="infoModal.id"
              :title="infoModal.title"
              @hide="resetInfoModal"
              @ok="handleOk"
            >
              <form ref="form" @submit.stop.prevent="handleSubmit">
                <b-form-group
                  label="Новый баланс"
                  label-for="name-input"
                  invalid-feedback="Name is required"
                >
                  <b-form-input id="name-input" required></b-form-input>
                </b-form-group>
              </form>
            </b-modal>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import axios from "axios";

export default {
  name: "list",
  components: {},
  data() {
    return {
      loading: false,
      idPost: "",
      items: Array,
      infoModal: {
        id: "info-modal",
        title: "",
        content: "",
      },
      fields: [
        {
          key: "title",
          label: "Title",
          sortable: true,
        },
        {
          key: "words",
          label: "Кол-во слов",
          sortable: true,
        },
        {
          key: "difference_point",
          label: "Прирост слов",
          sortable: true,
          // Variant applies to the whole column, including the header and footer
        },
        {
          key: "status",
          label: "Статус",
          sortable: true,
        },
        {
          key: "total_sources",
          label: "Кол-во источников",
          sortable: true,
        },
        {
          key: "updated_at",
          label: "Последнее обновление",
          sortable: true,
        },
        { key: "actions", label: "Actions" },
        ,
      ],
    };
  },
  methods: {
    handleOk(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      // Trigger submit handler
      this.handleSubmit();
    },
    sourcePost(item, index, button) {
      this.$router.push({ path: `/sources/source/${item.id}` });
    },
    createPost() {
      this.$router.push({ path: `/posts/create` });
    },
    editPost(item, index, button) {
      this.infoModal.title = item.name;
      this.idPost = item.id;
      this.$router.push({ path: `/posts/edit/${item.id}` });
      //this.$root.$emit("bv::show::modal", this.infoModal.id, button);
    },
    deletePost(item, index, button) {
      this.idPost = item.id;
      let self = this;
      axios.get("/sanctum/csrf-cookie").then((response) => {
        axios
          .post("/api/posts/delete", {
            id_post: self.idPost,
          })
          .then((response) => {
            if (response.status) {
              console.log("Вызвали алерт");
              this.getCheck();
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
    getPosts() {
      let self = this;
      axios
        .get("/api/posts/list")
        .then(function (response) {
          self.items = response.data.posts;
          console.log(response.data.posts);
        })
        .catch(function (error) {
          console.error(error);
        });
    },
    resetInfoModal() {
      this.infoModal.title = "";
      this.infoModal.content = "";
    },
    async handleSubmit() {
      let self = this;
      axios.get("/sanctum/csrf-cookie").then((response) => {
        axios
          .post("/api/finance/set-balance", {
            id_check: self.idPost,
          })
          .then((response) => {
            if (response.status) {
              console.log("Вызвали алерт");
              this.getCheck();
              this.$refs["my-modal"].hide();
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
    this.getPosts();
  },
  computed: {},
};
</script>