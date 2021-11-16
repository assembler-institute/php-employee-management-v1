const FOOTER = `
<footer class="bg-dark text-center">
    <!-- Copyright -->
    <div class="text-center p-3">
        © 2021 Copyright: Paola y Paris

    </div>
    <!-- Copyright -->
</footer>
<script src="../assets/js/ajax/createEmployee.js"></script>
<script src="../assets/js/ajax/readEmployee.js"></script>
<script src="../assets/js/ajax/updateEmployee.js"></script>
<script src="../assets/js/ajax/deleteEmployee.js"></script>
`;

const insertFooter = () => {
  //get the body element
  document.lastElementChild.lastElementChild.insertAdjacentHTML(
    "beforeend",
    FOOTER
  );
};

insertFooter();
