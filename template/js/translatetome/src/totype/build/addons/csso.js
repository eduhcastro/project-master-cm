"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
const fs_1 = __importDefault(require("fs"));
const csso_1 = __importDefault(require("csso"));
const css = fs_1.default.readFileSync(__dirname + "/../translatetome.google.css", "utf8");
const result = csso_1.default.minify(css, {
    filename: __dirname + "/translatetome.google.css",
    sourceMap: true
});
fs_1.default.writeFileSync(__dirname + "/../../build/translatetome.google.css", result.css);
//# sourceMappingURL=csso.js.map