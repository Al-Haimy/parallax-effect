wp.blocks.registerBlockType("ourplugin/are-you-paying-attention", {
  title: "Are you Paying Attention?",
  icon: "smilye",
  category: "common",
  edit: function () {
    return (
      <div>
        <p>Hello, this is a paragraph</p>
        <h4> Hithere</h4>
      </div>
    );
  },
  save: function () {
    return wp.element.createElement("h1", null, "This is the frontend.");
  },
});
