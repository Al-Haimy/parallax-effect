wp.blocks.registerBlockType("ourplugin/are-you-paying-attention", {
  title: "Are you Paying Attention?",
  icon: "smilye",
  category: "common",
  attributes: {
    skyColor: { type: "string" },
    grassColor: { type: "string" },
  },
  edit: function (props) {
    function updateSkyColor(e) {
      props.setAttributes({ skyColor: e.target.value });
    }
    function updateGrassColor(e) {
      props.setAttributes({ grassColor: e.target.value });
    }
    return (
      <div>
        <input
          type="text"
          name=""
          placeholder="sky color"
          id=""
          onChange={updateSkyColor}
          value={props.attributes.skyColor}
        />
        <input
          type="text"
          name=""
          id=""
          placeholder="grass color"
          onChange={updateGrassColor}
          value={props.attributes.grassColor}
        />
      </div>
    );
  },
  save: function (props) {
    return null;
  },
});
