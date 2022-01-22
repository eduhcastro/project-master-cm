"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
const fs_1 = __importDefault(require("fs"));
const jso = fs_1.default.readFileSync(__dirname + "/../translatetome.flags.json", "utf8");
var minified = JSON.stringify(JSON.parse(jso));
fs_1.default.writeFileSync(__dirname + "/../../build/translatetome.flags.json", minified);
//# sourceMappingURL=json.js.map